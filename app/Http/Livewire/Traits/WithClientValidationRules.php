<?php

namespace App\Http\Livewire\Traits;

trait WithClientValidationRules
{
    protected $rules = [
        'birthday' => 'date',
        'newClientImage' => 'nullable|image|max:1024|mimes:png,jpg,jpeg,gif',
        'editing.firstname' => 'required|string|max:255|min:3',
        'editing.lastname' => 'string|max:255|min:3',
        'editing.phone' => 'required|phone:GH,NG',
        'editing.email' => 'email',
        'editing.address' => 'string|max:255|min:3',
        'editing.type' => 'required|string|max:255|min:3',
    ];
}
