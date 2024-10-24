@component('mail::message')
    # Order Confirmation

    Hello {{ $order->user->name }},

    Thank you for your order! Your order has been confirmed.

    ## Order Details:
    - Order ID: {{ $order->id }}
    - Total: ${{ number_format($order->total, 2) }}
    - Status: {{ ucfirst($order->status) }}

    @component('mail::table')
        | Product | Quantity | Unit Price | Total Price |
        |:------------- |:-------------:| ---------------:| ------------:|
        @foreach ($order->orderItems as $item)
            | {{ $item->product->name }} | {{ $item->quantity }} | ${{ number_format($item->unit_price, 2) }} |
            ${{ number_format($item->total_price, 2) }} |
        @endforeach
    @endcomponent

    You can track your order status anytime by logging into your account.

    Thanks for shopping with us!

    @component('mail::button', ['url' => route('orders.show', $order->id)])
        View Order
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
