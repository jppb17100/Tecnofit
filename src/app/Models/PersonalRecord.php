<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalRecord extends Model
{
    protected $table = 'personal_records';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
