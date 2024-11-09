<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Azs extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'address', 'owner', 'fuel_stock', 'fuel_price'];
}
