<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;
use App\Http\Requests;
use App\Models\Product;
use App\Models\User;
use Auth;
use Form;
use Illuminate\Support\Facades\Input as Input;

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
        return view('products.show', compact('product'));
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


        session()->flash('success', 'Create product successfully!');
        return redirect()->route('products.show', [$product]);
    }

    public function edit(Product $product)
    {
        //$this->authorize('update', $currentuser);
        return view('products.edit', compact('product'));
        
    }

    public function update(Request $request)
    {
        $this->validate($request, [
        	'category' => 'max:50',
            'name' => 'required|max:50',
            'description' => 'required',
            'contact' => 'required|max:100',
        ]);

        //$this->authorize('update', $user);

        $product->update([
            'category' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'contact' => $request->request
        ]);
        

        session()->flash('success', 'Update product successfully');
        return redirect()->route('products.show', $product);
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

    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // initialize return data
        $data = [
            'success'   => false,
            'msg'       => 'upload fail!',
            'file_path' => ''
        ];
        
        if ($file = $request->upload_file) {
            // save impage to local
            $result = $uploader->save($request->upload_file, 'products', '1');
            
            // if save successfully
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "upload successfully!";
                $data['success']   = true;
            }
        }
        return $data;
    }

    public function image() {
        return view('products.image');
    }

    public function uploadImage1() {
        if (Input::hasFile('image')) {
            echo 'Uploaded';
            $file = Input::file('image');
            $file->move('public/upload', $file->getClientOriginalName());
            echo '<img src="public/upload/' . $file->getClientOriginalName() . '">';   
        }
    }
}
