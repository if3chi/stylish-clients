<?php

namespace App\Http\Livewire\Client;

use App\Http\Livewire\Traits\WithClientValidationRules;
use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ClientIndex extends Component
{
    use WithPagination, WithFileUploads, WithClientValidationRules;

    public Client $editing;
    public $show_form = false;
    public $newClientImage;
    public $editingImageUrl;
    public $birthday;
    public $form_title = '';
    public $showDelModal = false;
    public $selectedRecord;

    public function mount(){
        $this->selectedRecord = Client::make();
    }

    public function getForm($type = Null, Client $client)
    {
        if ($type == 'edit') {
            $this->form_title = 'Edit';
            $this->editing = $client;
            $this->editingImageUrl = $client->image_url;
            $this->birthday = $client->dob->toDateFormat();
        }

        if (!$type) {
            $this->form_title = 'Add';
            $this->editing = Client::make();
            $this->birthday = now()->toDateFormat();
        }

        $this->reset('newClientImage');
        $this->show_form = true;
    }

    public function save()
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

    public function getDelModal(Client $client)
    {
        $this->selectedRecord = $client;
        $this->showDelModal = true;
    }

    public function destroy()
    {
        if ($this->selectedRecord->clientImage) Storage::disk('client')->delete($this->selectedRecord->clientImage);
        $this->selectedRecord->delete();
        $this->notify([
            'title' => 'Deleted Successfuly',
            'body' => $this->selectedRecord->firstname . " " . $this->selectedRecord->lastname
        ]);
        $this->showDelModal = false;
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
