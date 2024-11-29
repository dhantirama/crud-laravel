<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id_customer', 'order_code', 'order_date', 'order_end_date', 'order_status', 'total_price'];
    // protected $table = "type_of_services"; //jika nama tabel berbeda dari database
    //ORM object relation mappung/model
    //ONE TO MANY, MANY TO ONE, MANY TO MANY

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }
}
