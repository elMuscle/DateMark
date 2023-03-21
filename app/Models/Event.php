<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['datum', 'was', 'beginn', 'ende', 'ort','tpoll_id', 'need'];

    protected $casts = [
        'datum' => 'date:Y-m-d',
        'beginn' => 'datetime:H:i',
        'ende' => 'datetime:H:i',
    ];

    public function tpoll()
    {

        return $this->belongsTo(Tpoll::class);

    }

    public function members()
    {

        return $this->belongsToMany(Member::class)->withPivot('id', 'verfuegbarkeit');

    }
}
