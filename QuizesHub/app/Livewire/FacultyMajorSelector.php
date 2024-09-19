<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin\Major;
use App\Models\Admin\Faculty;

class FacultyMajorSelector extends Component
{
    public $faculties;
    public $majors =[];
    public $facultyId;

    public function mount()
    {
        // Fetch all faculties from the database
        $this->faculties = Faculty::get();
    }

    public function updatedFacultyId($value)
    {
    
        $faculty = Faculty::findOrFail($value);
  
        $this->majors = $faculty ? $faculty->majors : [];
      
    }

    public function render()
    {
        return view('livewire.faculty-major-selector');
    }
}


