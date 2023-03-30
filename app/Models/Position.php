<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Position extends Model
{
    protected $table = 'position';
    protected $fillable = ['position']; 
    
    
    
    public function employees()
    {
        return $this->hasOne(Employee::class);
    }


}
