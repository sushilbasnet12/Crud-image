<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ["customer_name", "customer_address","product_types", "product_id"];

    protected $table = 'orders';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
