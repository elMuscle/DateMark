<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tpoll extends Model
{
    use HasFactory;

    protected $fillable = ['titel', 'info', 'beschreibung', 'status'];

    public function events()
    {

        return $this->hasMany(Event::class);

    }
}
