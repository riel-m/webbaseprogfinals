<?php

namespace App\Models;

use App\Models\animals;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animaltype extends Model
{
    use HasFactory;

    protected $table = 'animals';
    protected $fillable = ["type"];

    public function animal()
    {
        return $this->hasMany(animals::class);
    }
}
