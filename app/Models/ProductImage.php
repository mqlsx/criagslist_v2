<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{

	use Notifiable;

    protected $fillable = [
        'product_id', 'url'
    ];

    public $table = 'ProductImg';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // public function addUrl($url)
    // {
    //     if (!is_array($url)) {
    //         $url = compact('url');
    //     }
    //     $this->imageUrl()->sync($url, false);
    // }
}


