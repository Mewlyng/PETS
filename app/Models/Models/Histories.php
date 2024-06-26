<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histories extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'event_date',
        'title',
        'description',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
