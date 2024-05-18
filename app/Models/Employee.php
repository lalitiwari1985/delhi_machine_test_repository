<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'dob', 'gender', 'country_code', 'mobile_number', 'email', 'department_id', 'avatar'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
