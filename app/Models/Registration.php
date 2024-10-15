<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'status',
        'certificate_path',
        'registered_at',
        'canceled_at',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan model Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    //Relasi dengan model Certificate
    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }

    //Relasi dengan model payment
    public function payment()
    {
        return $this->hasOne(Payment::class, 'registration_id', 'id');
    }


}
