<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin\University;
use App\Models\Admin\Faculty;
use App\Models\Admin\Major;
use App\Models\Admin\Course;
use Livewire\Attributes\Rule;

class CreateExam extends Component
{

    public function rules()
    {
        return [
            // 'qType' => ['required'],
            // 'qText' => ['required'],
        ];
    }

    public $universities;
    public $faculties;
    public $majors;
    public $courses;

    public $university_id = '';
    public $faculty_id = '';
    public $course_id = '';
    public $course_name = '';
    public $eType = '';
    public $eDate = '';
    public $eDuration = '';

    public $questions = [];
    public $qType = '';
    public $qText = '';

    public $aType = '';
    public $aText = '';
    public $aIsCorrect = '';
    

    public function mount()
    {
        $this->universities = University::get();
        $this->faculties = Faculty::get();
        $this->majors = Major::get();
        $this->courses = Course::get();
    }

    public function addQuestion()
    {
        // $this->validate();
        $this->questions[] = [
            'type' => $this->qType,
            'text' => $this->qText,
            'answers' => [],
        ];
        $this->qText = '';
    }

    public function removeQuestion($i)
    {
        unset($this->questions[$i]);
        $this->questions = array_values($this->questions);
    }

    public function addAnswer($questionId)
    {
        // $this->validate();
        $this->questions[$questionId]['answers'][] = [
            'type' => $this->aType,
            'text' => $this->aText,
            'is_correct' => $this->aIsCorrect,
        ];
        $this->aType = '';
        $this->aText = '';
        $this->aIsCorrect = '';
    }

    

    public function render()
    {
        return view('livewire.create-exam');
    }
}
