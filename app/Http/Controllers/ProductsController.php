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

    public function show(Product $product)
    {   
        $images = $product->images()->orderBy('created_at', 'asc')->paginate(5);
        return view('products.show', compact('product', 'images'));
    }

    // public function index(Request $request, User $user)
    // { dd($request);
    // }

    public function index(Request $request, User $user)
    {
        $products = new Product;

        // Search for a user based on their name.  'LIKE', '%' . $request->input('name') . '%'
        if ($request->has('name')) {
            $products = $products->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }

        if ($request->has('category') && !is_null($request->input('category'))) {
            $products = $products->where('category', '=', $request->input('category'));
        }

        if ($request->has('min-price') && !is_null($request->input('min-price'))) {
            $products = $products->where('price', '>=', $request->input('min-price'));
        }

        if ($request->has('max-price') && !is_null($request->input('max-price'))) {
            $products = $products->where('price', '<=', $request->input('max-price'));
        }

        // Only return users who are assigned
        // // to the given sales manager(s).
        // if ($request->has('managers')) {
        //     $user->whereHas('managers', function ($query) use ($request) {
        //         $query->whereIn('managers.name', $request->input('managers'));
        //     });
        // }

        // // Has an 'event' parameter been provided?
        // if ($request->has('event')) {

        //     // Only return users who have
        //     // been invited to the event.
        //     $user->whereHas('rsvp.event', function ($query) use ($request) {
        //         $query->where('event.slug', $request->input('event'));
        //     });
            
        //     // Only return users who have responded
        //     // to the invitation (with any type of
        //     // response).
        //     if ($request->has('responded')) {
        //         $user->whereHas('rsvp', function ($query) use ($request) {
        //             $query->whereNotNull('responded_at');
        //         });
        //     }

        //     // Only return users who have responded
        //     // to the invitation with a specific
        //     // response.
        //     if ($request->has('response')) {
        //         $user->whereHas('rsvp', function ($query) use ($request) {
        //             $query->where('response', 'I will be attending');
        //         });
        //     }
        // }

        // // Get the results and return them.
        //$products = $products->get();
        $products = $products->orderBy('created_at', 'desc')->paginate(10);
        return view('products.index', compact('products'));






        
    }

    public function create(User $user)
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'max:50',
            'name' => 'required|max:50',
            'description' => 'required',
            'contact' => 'required|max:100',
            'price' => 'required|min:0|regex:/^\d*(\.\d{1,2})?$/',
        ]);
        
        $product = Product::create([
            'category' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'contact' => $request->contact,
            'user_id' => Auth::user()->id,
            'price' => $request->price,
        ]);

        return redirect()->route('products.uploadImage', [$product]);
    }

    public function edit(Product $product)
    {
        $this->authorize('update', $product);
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

        $this->authorize('update', Product::find($product_id));
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

    public function destroy(Product $product)
    {
        $this->authorize('destroy', $product);
        $product->delete();
        session()->flash('success', 'delete product succssfully！');
        return redirect()->route('users.show', [Auth::user()]);
    }
}
