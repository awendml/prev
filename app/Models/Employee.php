<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;
use Illuminate\Database\Eloquent\SoftDeletes;


class Employee extends Model
{

    use SoftDeletes;
    protected $table = 'employee';

    protected $fillable = ['name','address','numemp','foto','position_id'];
    // protected $dates = ['deleted_at'];  


    public function position()
    {
       return $this->belongsTo(Position::class);
    }

}
