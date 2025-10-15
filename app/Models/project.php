<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = ['title', 'description', 'image', 'url','technologies'];



     // Récupérer les technologies sous forme de tableau
    public function getTechnologiesArrayAttribute()
    {
        return array_map('trim', explode(',', $this->technologies));
    }
    
}



