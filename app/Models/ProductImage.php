<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{

	use Notifiable;
	use SoftDeletes;

    protected $fillable = [
        'product_id', 'url'
    ];

    public $table = 'ProductImg';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}


