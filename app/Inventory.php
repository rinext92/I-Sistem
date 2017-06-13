<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'Inventory';

    protected $fillable = [
        'item_name', 'serialNumber', 'category', 'total', 'status'
    ];
}
