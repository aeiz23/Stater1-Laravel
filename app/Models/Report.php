<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table ='reports';

    protected $fillable=[
        'bus_id',
        'student_id',
        'desc'
    ];

    public function Bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id', 'id');
    }
    public function Student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
