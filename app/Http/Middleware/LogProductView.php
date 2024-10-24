<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogProductView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the request is for a product page
        if ($request->route('product-details', $request->slug)) {
            $product = Product::find($request->route('product-details', $request->slug));
            $product->views += 1;
            $product->save();
        }

        return $next($request);
    }
}
