<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use Notifiable;
    use SoftDeletes;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 'name', 'description', 'contact', 'user_id', 'price'
    ];
    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function collected()
    {
        return $this->belongsToMany(User::Class, 'wishlist', 'product_id', 'user_id')->withTimestamps();
    }

    public function images() 
    {
        return $this->hasMany(ProductImage::Class);
    }

    public function feed()
    {
        dd($this->image()->orderBy('created_at', 'asc'));
        //return $this->image()->orderBy('created_at', 'asc');
    }

    
}
