<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\WithUtilities;
use App\Http\Livewire\Traits\WithClientValidationRules;

class ClientIndex extends Component
{
    use WithPagination,
        WithFileUploads,
        WithClientValidationRules,
        WithUtilities;


    public Client $editing;
    public $selectedRecord;
    public $newClientImage;
    public $form_title;
    public $show_form = false;
    public $showDelModal = false;


    public function mount()
    {
        $this->selectedRecord = Client::make();
    }

    public function getForm($type = 'add', Client $client)
    {
        $this->setFormDetails($type, $client);
        $this->reset('newClientImage');
        $this->show_form = true;
    }

    public function save()
    {
        $file_name = $this->editing->clientImage;

        $this->validate();

        $file_name = $this->processImage($file_name, $this->newClientImage);

        $this->editing->updateOrCreate(
            ['id' => $this->editing->id],
            $this->setDetails($file_name)
        );

        $this->notify(
            $this->notificationMsg(
                $this->form_title === 'Edit' 
                ? 'Updated Successfuly' 
                : 'Added Successfuly', 
                $this->editing
            )
        );

        $this->show_form = false;
    }

    public function getDelModal(Client $client)
    {
        $this->selectedRecord = $client;
        $this->showDelModal = true;
    }

    public function destroy()
    {
        $this->delImage($this->selectedRecord->clientImage);
        $this->selectedRecord->delete();

        $this->notify(
            $this->notificationMsg('Deleted Successfuly', $this->selectedRecord)
        );
        
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
