<?php

namespace App\Livewire;

use Livewire\Component;
use App\models\Admin\University;
use App\models\Admin\Faculty;
use App\models\Admin\Major;
use App\models\Admin\Course;

class SendExam extends Component
{
    public $universities;
    public $faculties = [];
    public $majors = [];
    public $courses = [];

    public $selectedUniversity = null;
    public $selectedFaculty = null;
    public $selectedMajor = null;
    public $selectedCourse = null;

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
        $this->courses = [];
    }

    public function updatedSelectedFaculty($facultyId)
    {
        $this->majors = Major::whereHas('faculties', function ($query) use ($facultyId) {
            $query->where('faculty_id', $facultyId);
        })->get();
        $this->selectedMajor = null;
        $this->courses = [];
    }

    public function updatedSelectedMajor($majorId)
    {
        $this->courses = Course::whereHas('majors', function ($query) use ($majorId) {
            $query->where('major_id', $majorId);
        })->get();
        $this->selectedCourse = null;
    }

    public function render()
    {
        return view('livewire.send-exam');
    }
}
