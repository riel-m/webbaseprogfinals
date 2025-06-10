<?php

namespace App\Models;

use app\Models\User;
use app\Models\animals;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adoptionplan extends Model
{
    use HasFactory;

    protected $table = "adoptionplan";

    protected $fillable = [
        'animal_id',
        'user_id',
        'adopter_name',
        'adopter_email'
    ];

    public function animal()
    {
        return $this->belongsTo(animals::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
