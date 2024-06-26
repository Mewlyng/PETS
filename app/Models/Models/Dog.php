<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;
    protected $guarded = [];
	/**
     * Rename Default Table Name
     *
     * @var string
     */
    protected $table = 'dogs';
}
