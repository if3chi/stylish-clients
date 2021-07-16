<?php

namespace App\Http\Livewire\Traits;

use App\Models\Client;
use Illuminate\Support\Facades\Storage;

trait WithUtilities
{

    public $birthday;
    public $editingImageUrl;


    public function setName($client)
    {
        return $client->firstname . ' ' . $client->lastname;
    }

    public function setFormDetails(string $type, Client $client)
    {
        if ($type == 'edit') {
            $this->form_title = 'Edit';
            $this->editing = $client;
            $this->editingImageUrl = $client->image_url;
            $this->birthday = $client->dob->toDateFormat();
        }

        if ($type === 'add') {
            $this->form_title = 'Add';
            $this->editing = Client::make();
            $this->birthday = now()->toDateFormat();
            $this->reset('page');
        }
    }

    public function setDetails($filename): array
    {
        return
            [
                'dob' => $this->birthday,
                'clientImage' =>  $filename,
                'firstname' => $this->editing->firstname,
                'lastname' => $this->editing->lastname,
                'phone' => $this->editing->phone,
                'email' => $this->editing->email,
                'address' => $this->editing->address,
                'type' => $this->editing->type,
            ];
    }

    public function processImage($filename, $newImage)
    {
        if ($newImage) {
            $this->delImage($filename);
            $filename = $newImage->store('/', 'client');
        }

        return $filename;
    }

    public function delImage($filename)
    {
        if ($filename) Storage::disk('client')->delete($filename);
    }

    public function notificationMsg($title, $body)
    {
        return [
            'title' => $title,
            'body' => $this->setName($body)
        ];
    }
}
