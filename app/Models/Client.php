<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['firstname', 'lastname', 'clientImage', 'phone', 'email', 'dob', 'address', 'type'];

    protected $casts = [
        'dob' => 'date'
    ];

    public function getBirthdayForHumanAttribute(){
        return $this->dob->format('M, d Y');
    }
    
    public function getDueBirthdayAttribute(){
        $birthday = Carbon::parse($this->dob)
                        ->year(date('Y'));

        $dueDay = Carbon::now()->diffInDays($birthday, false);

        return  $dueDay >= 0
        ? $dueDay
        : Carbon::now()->diffInDays($birthday->addYear(1), false);
    }

    public function getImageUrlAttribute(){
        return $this->clientImage
        ? Storage::disk('client')->url($this->clientImage)
        : url('imgs/client.jpg');
    }
}
