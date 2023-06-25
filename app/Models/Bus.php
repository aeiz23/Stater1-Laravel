<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $table ='buses';

    protected $fillable=[
      
        'driver_id',
        'plate_no',
        'route',
        'schedule',
        'link',
        'status'
    ];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}