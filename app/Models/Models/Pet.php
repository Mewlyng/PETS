<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'breed', 'description', 'age'];
	/**
     * Rename Default Table Name
     *
     * @var string
     */
    protected $table = 'pets';


    public function histories()
    {
        return $this->hasMany(histories::class);
    }
}
