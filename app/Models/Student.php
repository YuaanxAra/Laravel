<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\SchoolClass;
use App\Models\Grade;

class Student extends Model
{
    protected $fillable = ['nis', 'name', 'school_class_id', 'email'];


    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }


    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
