<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\{Component, WithFileUploads, WithPagination};
use App\Http\Livewire\Traits\{WithUtilities, WithClientValidationRules};

class ClientIndex extends Component
{
    use
        WithUtilities,
        WithPagination,
        WithFileUploads,
        WithClientValidationRules;


    public Client $editing;
    public $show_form = false, $form_title = '', $showDelModal = false;
    public $newClientImage, $editingImageUrl, $birthday, $selectedRecord;

    public function mount()
    {
        $this->selectedRecord = Client::make();
    }

    public function getForm($type = 'add', Client $client): void
    {
        $this->setFormDetails($type, $client);
        $this->reset('newClientImage');
        $this->show_form = true;
    }

    public function save(): void
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

    public function getDelModal(Client $client): void
    {
        $this->selectedRecord = $client;
        $this->showDelModal = true;
    }

    public function destroy(): void
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
