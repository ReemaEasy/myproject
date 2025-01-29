<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coffee extends Model
{
    use HasFactory;
    protected $table = 'coffees';

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'coffee_name',
        'coffee_type',
        'price',
    ];

    // Add a new coffee to the database
    public static function addCoffee($data)
    {
        return self::create($data);
    }

    // Edit a coffee by its ID
    public static function editCoffee($id, $data)
    {
        $coffee = self::find($id);
        if ($coffee) {
            $coffee->update($data);
            return $coffee;
        }
        return null;
    }

    // Delete a coffee by its ID
    public static function deleteCoffee($id)
    {
        $coffee = self::find($id);
        if ($coffee) {
            $coffee->delete();
            return true;
        }
        return false;
    }
}
