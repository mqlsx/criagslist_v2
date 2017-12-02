<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;
use App\Http\Requests;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductImage;
use Auth;
use Form;


class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [            
            'except' => ['show', 'index']
        ]);
    }

    public function create(User $user)
    {
    	//$this->authorize('update', $user);
        return view('products.create');
    }

    public function show(Product $product)
    {
        $images = $product->images()->orderBy('created_at', 'asc')->paginate(5);
        return view('products.show', compact('product', 'images'));
    }

    

    public function edit(Product $product)
    {
        //$this->authorize('update', $currentuser);
        return view('products.edit', compact('product'));
        
    }

    public function update(Request $request, $product_id)
    {
        $this->validate($request, [
        	'category' => 'max:50',
            'name' => 'required|max:50',
            'description' => 'required',
            'contact' => 'required|max:100',
        ]);

        $this->authorize('update', Auth::user());
        $product = Product::find($product_id);
        $product->update([
            'category' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'contact' => $request->contact
        ]);
        
        $images = $product->images()->orderBy('created_at', 'desc')->paginate(5);
        return view('products.uploadImage', compact('product', 'images'));
    }

    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    public function destroy(Product $product)
    {
        $this->authorize('destroy', $product);
        $product->delete();
        session()->flash('success', 'delete product succssfully！');
        return redirect()->route('users.show', [Auth::user()]);
    }

    

    

    

    public function uploadImage1() {
        if (Input::hasFile('image')) {
            echo 'Uploaded';
            $file = Input::file('image');
            $file->move('public/upload', $file->getClientOriginalName());
            echo '<img src="public/upload/' . $file->getClientOriginalName() . '">';   
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'max:50',
            'name' => 'required|max:50',
            'description' => 'required',
            'contact' => 'required|max:100',
        ]);
        

        $product = Product::create([
            'category' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'contact' => $request->contact,
            'user_id' => Auth::user()->id,
        ]);


        //session()->flash('success', 'Create product successfully!');
        //return redirect()->route('products.show', [$product]);
        return redirect()->route('products.uploadImage', [$product]);
    }

    
}
