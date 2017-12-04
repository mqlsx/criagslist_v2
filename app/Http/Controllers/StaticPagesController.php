<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Status;
use Auth;

use App\Models\Product;
use App\Models\ProductImage;

class StaticPagesController extends Controller
{
    public function home(Request $request)
    {
        $products = new Product;
        
        if ($request->has('name')) {
            $products = $products->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }

        if ($request->has('category') && !is_null($request->input('category')) && $request->input('category')!="all") {
            $products = $products->where('category', '=', $request->input('category'));
        }

        if ($request->has('min-price') && !is_null($request->input('min-price'))) {
            $products = $products->where('price', '>=', $request->input('min-price'));
        }

        if ($request->has('max-price') && !is_null($request->input('max-price'))) {
            $products = $products->where('price', '<=', $request->input('max-price'));
        }

        $products = $products->orderBy('created_at', 'desc')->paginate(10);

        foreach ($products as $product) {
            $image = $product->images()->first();
            if ($image==null) {
                $product->img = "/img/not_uploaded.png";
            } else {
                $product->img = $image['url'];
            }
        }
        $request->flash();
        return view('static_pages/home', compact('products'));

    }
}
