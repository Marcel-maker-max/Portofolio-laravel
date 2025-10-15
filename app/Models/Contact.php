<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Le nom de la table est "contact" (singulier) dans la migration
    protected $table = 'contact';

    protected $fillable = ['name', 'email', 'subject', 'message'];
}
