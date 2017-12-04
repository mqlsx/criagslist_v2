<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;
use Auth;
use Illuminate\Support\Facades\Input as Input;

class ImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function image(Product $product) {
        if ($product->user_id === Auth::user()->id)
            ;
        else
            return back();
        $images = $product->images()->orderBy('created_at', 'desc')->paginate(5);
        return view('products.uploadImage', compact('product', 'images'));
    }


    public function uploadImage(Request $request, Product $product)
    {
        if ($product->user_id === Auth::user()->id)
            ;
        else
            return back();
        
        if (Input::hasFile('image')) {
            $file = Input::file('image');

            $folder_name = "uploads/images/products/" . date("Ym", time()) . '/'.date("d", time()).'/';
            $upload_path = public_path() . '/' . $folder_name;
            //echo $upload_path;
            //echo "<br>";
            $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
            $filename = Auth::user()->id . '_' . '_' . str_random(10) . '.' . $extension;
            $img = $folder_name . $filename;

            $file->move($upload_path, $filename);

            //$img = "<img src='http://craigslist.app/" . "$img'>";
            $img = 'http://craigslist.app/' . $img;
            
            $product->images()->create([
                'product_id' => $product->id,
                'url' => $img
                ]);
            //dd($product->image()->first());
            $images = $product->images()->orderBy('created_at', 'desc')->paginate(5);
            
            return redirect()->route('products.uploadImage', compact('product', 'images'));
        }
        else {
            $images = $product->images()->orderBy('created_at', 'desc')->paginate(5);
            return redirect()->route('products.uploadImage', compact('product', 'images'));
        }
    }

    public function destroy($img)
    {
        $img = ProductImage::find($img);
        $this->authorize('destroy', $img);
        $img->delete();
        session()->flash('success', 'the image has been deleted successfully！');
        $imgs = Product::find($img->product_id)->images()->orderBy('created_at', 'asc')->paginate(30); 
        $product = Product::find($img->product_id);
        return redirect()->route('products.uploadImage', compact('product'));
    }
}