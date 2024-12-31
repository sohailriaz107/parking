<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $table='parkings';
    protected $fillable=['name','vehicleNumber','slotNumber','status','image'];
}
