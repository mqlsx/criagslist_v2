<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class Product extends Model
{
	use Notifiable;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 'name', 'description', 'contact', 'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function collected()
    {
        return $this->belongsToMany(User::Class, 'wishlist', 'product_id', 'user_id')->withTimestamps();
    }
}
