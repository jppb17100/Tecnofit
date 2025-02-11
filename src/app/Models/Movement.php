<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $table = 'movements';
    public $timestamps = false;

    public function personalRecords()
    {
        return $this->hasMany(PersonalRecord::class);
    }
}
