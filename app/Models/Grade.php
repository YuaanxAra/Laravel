<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Grade extends Model
{
protected $fillable = ['student_id','subject_id','entered_by','score','term'];


public function student() { return $this->belongsTo(Student::class); }
public function subject() { return $this->belongsTo(Subject::class); }
public function enteredBy() { return $this->belongsTo(\App\Models\User::class,'entered_by'); }
}