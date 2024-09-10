<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Hero;
use App\Models\Menu;
use App\Models\About;
use App\Models\Event;
use App\Models\Whyus;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Review;
use App\Models\Special;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $products = Product::where('status', 1)->get();
        return view('frontend.pages.home',compact('products'));
    }


    public function product(){
        $products = Product::where('status', 1)->get();
        return view('frontend.pages.home_section.product',compact('products'));
    }

    public function product_details($id){
        $product = Product::find($id);
        $reviews = Review::where('status', 1)->get();
        return view('frontend.pages.product_details',compact('product','reviews'));
    }

    public function blog(){
        return view('frontend.pages.blog');
    }

    public function showCart() {
        $carts = $this->getCartCount(); // Replace with your actual method to get cart count
        return view('frontend.include.navbar', ['carts' => $carts]);
    }
    

}
