<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // Define quais campos podem ser preenchidos em massa
    protected $fillable = ['name', 'email', 'website'];
}
