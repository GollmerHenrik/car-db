<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    use HasFactory;

    public $timestamps=false;
    //protected $fillable = ['name'];

    function models()
    {
        return $this->hasMany(CarModel::class);
    }

    public static function findByLetter($letter)
    {
        return self::where('name', 'like', $letter . '%')->paginate(10);
    }
}
