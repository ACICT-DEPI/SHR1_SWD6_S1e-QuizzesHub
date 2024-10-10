<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin\University;
use App\Models\Admin\Faculty;
use App\Models\Admin\Major;

class CreateUserForm extends Component
{

    public $universities;
    public $faculties = [];
    public $majors = [];

    public $selectedUniversity = null;
    public $selectedFaculty = null;
    public $selectedMajor = null;

    public function mount()
    {
        $this->universities = University::all();
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

    public function render()
    {
        return view('livewire.create-user-form');
    }
}
