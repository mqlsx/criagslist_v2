<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Product;
use Auth;

class CollectionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Product $product)
    {
        if (Auth::user()->id === $product->user_id) {
            return redirect('/');
        }

        if (!Auth::user()->isCollected($product->id)) {
            Auth::user()->collect($product->id);
        }

        return redirect()->route('products.show', $product->id);
    }

    public function destroy(Product $product)
    {
        if (Auth::user()->id === $product->user_id) {
            return redirect('/');
        }

        if (Auth::user()->isCollected($product->id)) {
            Auth::user()->unCollect($product->id);
        }

        return redirect()->route('products.show', $product->id);
    }
}