<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductImagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function destroy(User $currentUser, ProductImage $img)
    {
        return $currentUser->id === Product::find($img->product_id)->user_id;
    }
}
