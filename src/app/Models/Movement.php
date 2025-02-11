<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $table = 'movements'; // importante se sua tabela não seguir a convenção

    public function personalRecords()
    {
        return $this->hasMany(PersonalRecord::class);
    }
}
