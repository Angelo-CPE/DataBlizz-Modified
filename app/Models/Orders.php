<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    
    // The 'created_at' and 'updated_at' columns are automatically handled by Eloquent,
    // so no need to include them in $fillable unless you want to explicitly set them.
    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'product_name',
        'product_id',
    ];

    use HasFactory;
}
