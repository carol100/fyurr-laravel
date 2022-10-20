<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends BaseModel
{
    public function getGenresAttribute($key)
    {
        return explode(',', $key);
        
    }
}
