<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin\User;
use App\Models\Admin\University;
use App\Models\Admin\Faculty;
use App\Models\Admin\Major;

class UpdateUserForm extends Component
{
    public $user;
    public $universities;
    public $faculties = [];
    public $majors = [];

    public $selectedUniversity = null;
    public $selectedFaculty = null;
    public $selectedMajor = null;

    // Initialize with the user data
    public function mount(User $user)
    {
        $this->user = $user;
        $this->universities = University::all();

        // Pre-select the user's current university, faculty, and major
        $this->selectedUniversity = $user->university_id;
        $this->selectedFaculty = $user->faculty_id;
        $this->selectedMajor = $user->major_id;

        // Load faculties and majors based on user's existing selections
        if ($this->selectedUniversity) {
            $this->faculties = Faculty::whereHas('universities', function ($query) {
                $query->where('university_id', $this->selectedUniversity);
            })->get();
        }

        if ($this->selectedFaculty) {
            $this->majors = Major::whereHas('faculties', function ($query) {
                $query->where('faculty_id', $this->selectedFaculty);
            })->get();
        }
    }

    public function updatedSelectedUniversity($universityId)
    {
        $this->faculties = Faculty::whereHas('universities', function ($query) use ($universityId) {
            $query->where('university_id', $universityId);
        })->get();

        $this->selectedFaculty = null;
        $this->majors = [];
    }

    public function updatedSelectedFaculty($facultyId)
    {
        $this->majors = Major::whereHas('faculties', function ($query) use ($facultyId) {
            $query->where('faculty_id', $facultyId);
        })->get();
    }

    public function updateUser()
    {
        dd($this->selectedUniversity, $this->selectedFaculty, $this->selectedMajor);
        $this->validate([
            'selectedUniversity' => ['required','integer', 'exists:universities,id'],
            'selectedFaculty' => ['required','integer', 'exists:faculties,id'],
            'selectedMajor' => ['required','integer', 'exists:majors,id'],
        ]);

        // Update the user's university, faculty, and major
        $this->user->update([
            'university_id' => $this->selectedUniversity,
            'faculty_id' => $this->selectedFaculty,
            'major_id' => $this->selectedMajor,
        ]);

        // Optionally, add a success message or redirect
        session()->flash('message', 'User updated successfully!');
    }

    public function render()
    {
        return view('livewire.update-user-form');
    }
}
