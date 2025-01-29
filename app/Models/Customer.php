<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows Laravel's naming convention)
    protected $table = 'customers';

    // Specify fillable attributes for mass assignment
    protected $fillable = [
        'user_name',
        'contact',
    ];

    // Disable timestamps if they are not included in the migration
    public $timestamps = false;
}
