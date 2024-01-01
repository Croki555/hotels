<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'poster_url',
        'address'
    ];

    public function facilities()
    {
        return $this->belongsToMany(Facilitie::class,FacilitiyHotel::class, );
    }

    public function price()
    {
        return $this->hasOne(Room::class)
            ->selectRaw('price')
            ->orderBy('price', 'asc');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
