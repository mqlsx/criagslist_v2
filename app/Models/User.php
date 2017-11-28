<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use App\Models\Product;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function gravatar($size = '100')
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function collections()
    {
        return $this->belongsToMany(Product::Class, 'wishlist', 'user_id', 'product_id')->withTimestamps();
    }

    public function collect($product_ids)
    {
        if (!is_array($product_ids)) {
            $product_ids = compact('product_ids');
        }
        $this->collections()->sync($product_ids, false);
    }

    public function unCollect($product_ids)
    {
        if (!is_array($product_ids)) {
            $product_ids = compact('product_ids');
        }
        $this->collections()->detach($product_ids);
    }

    public function isCollected($product_id)
    {
        return $this->collections->contains($product_id);
    }
    
}
