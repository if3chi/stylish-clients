<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ClientIndex extends Component
{
    use WithPagination, WithFileUploads;

    public Client $editing;
    public $show_form = false, $form_title = '';
    public $newClientImage, $editingImageUrl, $birthday;

    protected $rules = [
        'birthday' => 'date',
        'newClientImage' => 'nullable|image|max:1024',
        'editing.firstname' => 'required|string|max:255|min:3',
        'editing.lastname' => 'string|max:255|min:3',
        'editing.phone' => 'required|phone:GH,NG',
        'editing.email' => 'email',
        'editing.address' => 'string|max:255|min:3',
        'editing.type' => 'required|string|max:255|min:3',
    ];

    public function getForm($type = Null, Client $client): void
    {
        if ($type == 'edit') {
            $this->form_title = 'Edit';
            $this->editing = $client;
            $this->editingImageUrl = $client->image_url;
            $this->birthday = $this->editing->dob->format('Y-m-d');
        }

        if (!$type) {
            $this->form_title = 'Add';
            $this->editing = Client::make();
            $this->birthday = now()->format('Y-m-d');
        }

        $this->reset('newClientImage');
        $this->show_form = true;
    }

    public function save(): void
    {
        $file_name = $this->editing->clientImage;

        $this->validate();

        if ($this->newClientImage) {
            if ($file_name) Storage::disk('client')->delete($file_name);
            $file_name = $this->newClientImage->store('/', 'client');
        }

        $this->editing->updateOrCreate(
            ['id' => $this->editing->id],
            [
                'dob' => $this->birthday,
                'clientImage' =>  $file_name,
                'firstname' => $this->editing->firstname,
                'lastname' => $this->editing->lastname,
                'phone' => $this->editing->phone,
                'email' => $this->editing->email,
                'address' => $this->editing->address,
                'type' => $this->editing->type,
            ]
        );

        $this->show_form = false;
        $this->notify([
            'title' => $this->form_title === 'Edit' ? 'Updated Successfuly' : 'Added Successfuly',
            'body' => $this->editing->firstname . " " . $this->editing->lastname
        ]);
    }

    public function render()
    {
        return view('livewire.client.client-index', [
            'clients' => Client::latest()
                ->paginate(5)
        ])
            ->layout('layouts.admin');
    }
}
