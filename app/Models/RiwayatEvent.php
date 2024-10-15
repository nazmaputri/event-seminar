<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatEvent extends Model
{
    use HasFactory;

    protected $table = 'riwayat_event';

    protected $fillable = [
        'user_id',
        'event_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

