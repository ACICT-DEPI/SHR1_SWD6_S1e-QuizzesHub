<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin\University;
use App\Models\Admin\Faculty;
use App\Models\Admin\Major;
use App\Models\Admin\Course;
use App\Models\Admin\Exam;
use App\Models\Admin\Question;
use App\Models\Admin\Answer;
use App\Models\Admin\CourseFacultyMajorUniversity;
use Livewire\WithFileUploads;

class CreateExamForm extends Component
{
    use WithFileUploads;

    public $universities = [];
    public $faculties = [];
    public $majors = [];
    public $courses = [];

    public $selectedUniversity = null;
    public $selectedFaculty = null;
    public $selectedMajor = null;
    public $selectedCourse = null;

    public $examType;
    public $examDate;
    public $examDuration;
    public $examId;

    public $questions = []; // To hold questions and their answers
    public $uploadedImages = [];

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
        $this->selectedMajor = null;
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
        $courses = CourseFacultyMajorUniversity::where('faculty_id', $this->selectedFaculty)
        ->where('major_id', $this->selectedMajor)
        ->where('university_id', $this->selectedUniversity)
        ->get();
        $this->courses = Course::whereIn('id', $courses->pluck('course_id'))->get();
    }

    public function createExam()
    {
        $this->validate([
            'selectedUniversity' => 'required',
            'selectedFaculty' => 'required',
            'selectedMajor' => 'required',
            'selectedCourse' => 'required',
            'examType' => 'required',
            'examDate' => 'required|date',
            'examDuration' => 'required|numeric',
        ]);

        // Create the exam and get its ID
        $exam = Exam::create([
            'course_id' => CourseFacultyMajorUniversity::where('course_id', $this->selectedCourse)
                ->where('faculty_id', $this->selectedFaculty)
                ->where('major_id', $this->selectedMajor)
                ->where('university_id', $this->selectedUniversity)
                ->first()->id,
            'type' => $this->examType,
            'date' => $this->examDate,
            'duration' => $this->examDuration,
        ]);

        // Store the exam ID for future use
        $this->examId = $exam->id;
    }

    // Add a new question to the array
    public function addQuestion()
    {
        // Initialize the question with an empty array, including answers
        $this->questions[] = [
            'type' => '',    // Question type (mcq, essay, true_false)
            'text' => '',    // Question text
            'answers' => [
                ['type' => 'normal_text', 'text' => '', 'is_correct' => false],
                ['type' => 'normal_text', 'text' => '', 'is_correct' => false],
                ['type' => 'normal_text', 'text' => '', 'is_correct' => false],
                ['type' => 'normal_text', 'text' => '', 'is_correct' => false],
            ],
        ];
    }

    public function updated($propertyName)
    {
        // Handle the case for true_false questions by resetting to two predefined answers
        foreach ($this->questions as $index => $question) {
            if ($question['type'] === 'true_false') {
                $this->questions[$index]['answers'] = [
                    ['type' => 'normal_text', 'text' => 'True', 'is_correct' => $this->questions[$index]['answers'][0]['is_correct']],
                    ['type' => 'normal_text', 'text' => 'False', 'is_correct' => $this->questions[$index]['answers'][1]['is_correct']],
                ];
            }

            if($question['type'] === 'essay') {
                $this->questions[$index]['answers'] = [];
            }
        }
    }

    public function setCorrectAnswer($questionIndex, $answerIndex)
    {
        // Uncheck all answers for the question
        foreach ($this->questions[$questionIndex]['answers'] as $index => $answer) {
            $this->questions[$questionIndex]['answers'][$index]['is_correct'] = false;
        }

        // Set the clicked answer as correct
        $this->questions[$questionIndex]['answers'][$answerIndex]['is_correct'] = true;
    }

    // Save the questions and their answers to the database
    public function saveQuestions()
    {

        // Create the question in the database
        foreach ($this->questions as $index => $question) {
            $createdQuestion = Question::create([
                'exam_id' => $this->examId,
                'type' => $question['type'],
                'text' => $question['text'],
            ]);

            foreach ($question['answers'] as $answerIndex => $answer) {
                // Handle image uploads if the answer type is 'image_path'
                if ($answer['type'] === 'image_path') {
                    // Save the uploaded file and get the path
                    $imagePath = $this->uploadedImages[$index][$answerIndex]->store('images/answers');
                    $answerText = $imagePath;
                } else {
                    $answerText = $answer['text'];
                }

                Answer::create([
                    'question_id' => $createdQuestion->id,
                    'type' => $answer['type'], // 'normal_text' or 'image_path'
                    'text' => $answerText,
                    'is_correct' => $answer['is_correct'],
                ]);
            }
        }


        // Optionally, you can reset the questions array or show a success message
        $this->questions = [];
        session()->flash('message', 'Questions and answers saved successfully!');
    }

    public function render()
    {
        return view('livewire.create-exam-form');
    }
}
