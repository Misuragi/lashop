<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Rating extends BaseModel
{

	protected $fillable = [
        'user_id',
        'product_id',
        'name',
        'summary',
        'review',
        'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
