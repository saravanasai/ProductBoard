<?php

namespace App\Models\KeyRequest;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyRequest extends Model
{
    use HasFactory;


    protected $table = "key_requests";


    protected $fillable = [
        "request_product_id",
        "request_domine",
        "request_ip",
        "request_username",
        "request_email",
        "request_is_processed",
    ];


    public function Product()
    {

        return $this->belongsTo(Product::class,'request_product_id','product_id');

    }
}
