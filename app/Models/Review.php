<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reviews';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'star',
        'description',
        'status',
        'created_by',
        'updated_by'
    ];

     // Additional logic to ensure one review per user per product
     public static function boot()
     {
         parent::boot();
 
         static::creating(function ($review) {
             if (self::where('user_id', $review->user_id)
                 ->where('product_id', $review->product_id)
                 ->exists()) {
                 throw new \Exception('You have already submitted a review for this product.');
             }
         });
     }
    

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
