<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin\Exam;
use App\Models\Admin\University;
use App\Models\Admin\Faculty;
use App\Models\Admin\Major;

class ExamFilter extends Component
{
    public $universities;
    public $faculties;
    public $majors;
    public $types;

    public $exams;
    public $selectedUniversity = null;
    public $selectedFaculty = null;
    public $selectedMajor = null;
    public $selectedType = null;

    public function mount()
    {
        $this->exams = Exam::get();
        $this->universities = University::get();
        $this->faculties = Faculty::get();
        $this->majors = Major::get();
        $this->types = ['final', 'midterm', 'oral', 'sheet'];
    }

    public function filterUniversity()
    {
        $this->render();
    }
    public function filterFaculty()
    {
        $this->render();
    }
    public function filterMajor()
    {
        $this->render();
    }
    public function filterType()
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.exam-filter')->with([
            'selectedUniversity' => $this->selectedUniversity,
        ]);
    }
}
