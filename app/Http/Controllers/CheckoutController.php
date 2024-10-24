<?php

namespace App\Http\Controllers;

use App\Jobs\SendOrderConfirmation;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Order;
use App\Models\OrderItem;
use Darryldecode\Cart\Facades\CartFacade;
use Darryldecode\Cart\Cart;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cartItems = \Cart::getContent();
        $total = \Cart::getTotal();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Create PayPal payment
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $total
                    ]
                ]
            ]
        ]);

        return redirect($response['links'][1]['href']); // Redirect to PayPal for approval
    }

    public function capturePayment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->query('token'));

        if ($response['status'] == 'COMPLETED') {
            // Payment successful, save the order
            $cartItems = \Cart::getContent();
            $total = \Cart::getTotal();

            // Create an order record
            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $total,
                'status' => 'pending',
                'payment_method' => 'PayPal',
                'payment_status' => 'Completed'
            ]);

            // Create order_items records
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->price,
                    'total_price' => $item->getPriceSum()
                ]);
            }

            dispatch(new SendOrderConfirmation($order));
            \Cart::clear(); // Clear the cart after placing the order

            return redirect()->route('order.success')->with('success', 'Order placed successfully!');
        }

        return redirect()->route('cart.index')->with('error', 'Payment failed.');
    }
}
