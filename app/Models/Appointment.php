<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'time', 'note', 'client_id', 'status'];

    protected $casts = [
        'date' => 'date',
        'time' => 'time',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
