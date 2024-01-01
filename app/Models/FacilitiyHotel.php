<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FacilitiyHotel extends Model
{
    use HasFactory;
    protected $table = 'facility_hotel';

    protected $fillable = [
        'facility_id',
        'hotel_id',
    ];
}
