<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Filament\Panel;

class Mosque extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'email2',
        'mobileno',
        'mobileno2',
        'masjidname',
        'address',
        'city',
        'zipcode',
        'state',
        'addresslink',
        'fajr',
        'zohar',
        'asr',
        'maghrib',
        'isha',
        'juma',
        'forladies',
        'timestamp',
        'reset_token',
        'reset_expiry',
        'aelaan',
    ];

    protected $casts = [
        'forladies' => 'boolean',
        'timestamp' => 'datetime',
        'reset_expiry' => 'datetime',
    ];



    public function canAccessPanel(Panel $panel): bool
    {
        return true;
        return $this->hasRole(['Admin','Writer', 'Moderator']);
    }

    public function canAccessFilament(): bool
    {
        return true;
        return $this->hasRole('Admin');
    }
}
