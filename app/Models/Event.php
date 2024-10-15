<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events'; // Nama tabel di database

    protected $fillable = [
        'penyelenggara_event',
        'judul_event',
        'deskripsi_event',
        'jenis_event',
        'kouta_peserta',
        'link_akses',
        'tanggal_dan_jam',
        'end_date', 
        'lokasi',
        'harga',
        'image',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'riwayat_event');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'event_id');
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
