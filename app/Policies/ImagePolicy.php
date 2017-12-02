<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, ProductImage $img)
    {
    	
        return $user->id === Product::find($img->product_id)->user_id;
    }

}
