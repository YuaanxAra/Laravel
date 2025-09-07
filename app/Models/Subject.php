<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Grade;


class Subject extends Model
{
protected $fillable = ['code','name','description'];


public function grades() {
return $this->hasMany(Grade::class);
}
}