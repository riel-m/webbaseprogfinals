<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centres extends Model
{
    use HasFactory;

    protected $table = "centres";
    protected $fillable = [
        "name",
        "location",
        "telephone",
        "email"
    ];

    public function animal()
    {
        return $this->hasMany(animals::class);
    }
}
