<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'product_name',
        'product_id',
        'created_at',
    ];
    use HasFactory;
}
