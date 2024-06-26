<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'vaccine_name',
        'vaccination_date',
        'vet_name',
        'notes',
    ];

    /**
     * Get the pet that owns the vaccination.
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
