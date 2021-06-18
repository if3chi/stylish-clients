<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ClientIndex extends Component
{
    use WithPagination;

    public $clientDetails = [];

    public function render()
    {
        
        return view('livewire.client.client-index', [
            'clients' => Client::latest()
            ->paginate(5)
        ])
        ->layout('layouts.admin');
    }
}
