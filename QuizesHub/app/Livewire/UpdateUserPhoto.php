<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateUserPhoto extends Component
{
    use WithFileUploads;

    public $photo;
    public $currentPhoto;

    public function mount()
    {
        $this->currentPhoto = Auth::user()->image_path;
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

    }


    public function save()
    {
        $this->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user = Auth::user();

        // Delete old photo if exists
        if ($user->image_path && Storage::exists($user->image_path)) {
            Storage::delete($user->image_path);
        }

        // Store the new photo
        $fileName = $user->username . '.' . $this->photo->getClientOriginalExtension();
        $this->photo->storeAs('images/users', $fileName);
        $fileName = 'images/users/' . $fileName;
        $user->image_path = $fileName;

        $user->save();
        $this->currentPhoto = $fileName;
        session()->flash('message', 'Profile photo updated successfully.');
    }

    public function render()
    {
        return view('livewire.update-user-photo');
    }
}
