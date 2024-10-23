<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.home');
    }

    public function shop(Request $request)
    {
        $products = Product::query();
        $categories = Category::all();

        // Handle the price filter
        if($request->has('price_filter') && in_array($request->input('price_filter'), ['1', '2', '3', '4', '5', '6'])) {

            switch ($request->input('price_filter')) {
            case 1:
                $priceMin = 0.00;
                $priceMax = 50.00;
                break;
            case 2:
                $priceMin = 50.00;
                $priceMax = 100.00;
                break;
            case 3:
                $priceMin = 100.00;
                $priceMax = 150.00;
                break;
            case 4:
                $priceMin = 150.00;
                $priceMax = 200.00;
                break;
            case 5:
                $priceMin = 200.00;
                $priceMax = 250.00;
                break;
            case 6:
                $priceMin = 250.00;
                $priceMax = null;
                break;
            default:
            }
            $products->whereBetween('price', [$priceMin, $priceMax]);
        }

        // Handle sorting by price
        if ($request->has('price_sort') && in_array($request->input('price_sort'), ['asc', 'desc'])) {
            $products->orderBy('price', $request->input('price_sort'));
        }

        $totalProductsCount = $products->count();
        $products = $products->paginate(12)->withQueryString();
        return view('site.shop', compact('products', 'categories', 'totalProductsCount'));
    }

    public function productDetails($slug) {
        $product = Product::where('slug', $slug)->first();
        return view('site.product', compact('product'));
    }

    public function contactUs() {
        return view('site.contact-us');
    }
}
