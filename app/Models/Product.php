<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'category_id',
        // 'review_id',
        // 'comment_id',
        // 'billing_id',
        // 'payment_id',
        'name',
        'description',
        'pre_price',
        'price',
        'quantity',
        'weight',
        'available',
        'status',
        'image',
        'created_by',
        'updated_by'
    ];
    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class,'review_id','id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class,'comment_id','id');
    }

    public function billing()
    {
        return $this->hasMany(Billing::class,'billing','id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class,'payment_id','id');
    }
}
