<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['firstname', 'lastname', 'clientImage', 'phone', 'email', 'dob', 'address', 'type'];

    protected $casts = [
        'dob' => 'date'
    ];

    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }

    public function getBirthdayForHumanAttribute()
    {
        return $this->dob->format('M, d Y');
    }

    public function getDueBirthdayAttribute(): int
    {
        $birthday = Carbon::parse($this->dob)
            ->year(date('Y'));

        $dueDay = Carbon::now()->diffInDays($birthday, false);

        return  $dueDay >= 0
            ? $dueDay
            : Carbon::now()->diffInDays($birthday->addYear(1), false);
    }

    public function getImageUrlAttribute(): string
    {
        return $this->clientImage
            ? Storage::disk('client')->url($this->clientImage)
            : url('imgs/client.jpg');
    }
}
