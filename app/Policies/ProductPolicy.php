<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Product;

class ProductPolicy
{
    use HandlesAuthorization;

    public function update(User $currentUser, Product $product)
    {
        return $currentUser->id === $product->user_id;
    }

    public function destroy(User $currentUser, Product $product)
    {
        if ($currentUser->id === 1)
            return true;
        else 
            return $currentUser->id === $product->user_id;
    }
}
