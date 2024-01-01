<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Facilitie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function hotel():HasMany
    {
        return $this->hasMany(Facilitie::class, FacilitiyHotel::class);
    }
}
