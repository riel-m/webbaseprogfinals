<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animals extends Model
{
    use HasFactory;

    protected $table = "animals";
    protected $fillable = [
        "name",
        "animaltype_id",
        "breed",
        "age",
        "centre_id",
        "image",
        "desc"
    ];

    public function adoptionPlans()
    {
        return $this->hasMany(adoptionplan::class, 'animal_id');
    }

    public function centre()
    {
        return $this->belongsTo(centres::class);
    }

    public function animaltype()
    {
        return $this->belongsTo(animaltype::class);
    }
}
