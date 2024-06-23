<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PropertyType extends Model
{
    use HasFactory; 

    protected $fillable = [
        'type_name',
        'type_icon'
    ];
}
