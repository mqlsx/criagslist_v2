<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Product;
use Auth;
use App\Models\ProductImage;

class UsersController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', [            
        //     'except' => ['create', 'store', 'validate_username']
        // ]);

        // $this->middleware('guest', [
        //     'only' => ['create',  'validate_username']
        // ]);
    }

    public function validate_username(Request $request){
        $username = $request->input( 'username' );
        $user = User::where('username', $username)->get();
        if(count($user)>0){
            return response()->json([
                'result' => 'ko'
            ]);
        }else{
            return response()->json([
                'state' => 'ok'
            ]);
        }
    }
    public function validate_email(Request $request){
        $username = $request->input( 'email' );
        $user = User::find([
            'email' => $email
        ]);
        if(count($user)>0){
            return "error";
        }else{
            return "ok";
        }
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);
        session()->flash('success', 'Welcome to craigslist~');
        return redirect()->route('users.show', [$user]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $this->authorize('update', $user);

        $data = [];
        $data['email'] = $request->email;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success', 'Update profile successfully');
        return redirect()->route('users.show', $user->id);
    }

    public function show(User $user)
    {
        $this->authorize('show', $user);
        $products = new Product;
        $products = $products->where('user_id', '=', $user->id);
        $products = $products->orderBy('created_at', 'desc')->paginate(10);
        return view('users.show', compact('user', 'products'));
    }

    public function index()
    {
        $this->authorize('index', Auth::user());
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);

        // delete wishlest
        $user->collections()->detach();
        
        // delete the postings
        $products = $user->products()->get();
        foreach ($products as $product) {

            // delete image
            $images = $product->images()->get();
            foreach ($images as $img) {
                $img->delete();
            }
            // delete product
            $product->delete();
        }


        // delete user 
        $user->delete();
        session()->flash('success', 'delete user succssfully！');
        return redirect()->route('users.index');
    }

    public function wishlist(User $user)
    {
        $products = $user->collections()->orderBy('created_at', 'desc')->paginate(10);
        foreach ($products as $product) {
            $image = $product->images()->first();
            if ($image==null) {
                $product->img = "/img/not_uploaded.png";
            } else {
                $product->img = $image['url'];
            }
        }
        return view('users.wishlist', compact('user', 'products'));
    }

    public function posting(User $user)
    {
        $products = new Product;
        $products = $products->where('user_id', '=', $user->id);
        $products = $products->orderBy('created_at', 'desc')->paginate(8);
        foreach ($products as $product) {
            $image = $product->images()->first();
            if ($image==null) {
                $product->img = "/img/not_uploaded.png";
            } else {
                $product->img = $image['url'];
            }
        }
        return view('users.posting', compact('user', 'products'));
    }
}