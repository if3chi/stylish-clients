<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['firstname', 'lastname', 'clientImage', 'phone', 'email', 'dob', 'address', 'type'];

    protected $dates = [
        'dob'
    ];
    
    public function getDueBirthdayAttribute(){
        $birthday = Carbon::parse($this->dob)
                        ->year(date('Y'));

        $dueDay = Carbon::now()->diffInDays($birthday, false);

        return  $dueDay >= 0
        ? $dueDay
        : Carbon::now()->diffInDays($birthday->addYear(1), false);
    }
}
