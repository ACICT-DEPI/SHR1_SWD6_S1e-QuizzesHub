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
use Illuminate\Support\Facades\Storage;

class UpdateExamForm extends Component
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
    public $exam;
    public function mount($exam)
    {
        $this->exam = $exam;

        $this->universities = University::all();

        $this->selectedUniversity = $exam->course->university->id;
        $this->updatedSelectedUniversity($exam->course->university->id);

        $this->selectedFaculty = $exam->course->faculty->id;
        $this->updatedSelectedFaculty($exam->course->faculty->id);

        $this->selectedMajor = $exam->course->major->id;
        $this->updatedSelectedMajor($exam->course->major->id);

        $this->selectedCourse = $exam->course->course->id;
        $this->examType = $exam->type;
        $this->examDate = $exam->date;
        $this->examDuration = $exam->duration;
        $this->examId = $exam->id;

        foreach($exam->questions as $question):
            $tmpAnswers = $question->answers->toArray();
            if($question->type == 'mcq')
            {
                $this->questions[] = [
                    'id' => $question->id,
                    'type' => $question->type,
                    'text' => $question->text,
                    'answers' => [
                        ['id' => $tmpAnswers[0]['id'], 'type'=>$tmpAnswers[0]['type'], 'text'=>$tmpAnswers[0]['text'], 'is_correct'=>$tmpAnswers[0]['is_correct']],
                        ['id' => $tmpAnswers[1]['id'], 'type'=>$tmpAnswers[1]['type'], 'text'=>$tmpAnswers[1]['text'], 'is_correct'=>$tmpAnswers[1]['is_correct']],
                        ['id' => $tmpAnswers[2]['id'], 'type'=>$tmpAnswers[2]['type'], 'text'=>$tmpAnswers[2]['text'], 'is_correct'=>$tmpAnswers[2]['is_correct']],
                        ['id' => $tmpAnswers[3]['id'], 'type'=>$tmpAnswers[3]['type'], 'text'=>$tmpAnswers[3]['text'], 'is_correct'=>$tmpAnswers[3]['is_correct']],
                    ],
                ];
            }
            else if($question->type == 'true_false')
            {
                $this->questions[] = [
                    'id' => $question->id,
                    'type' => $question->type,
                    'text' => $question->text,
                    'answers' => [
                        ['id' => $tmpAnswers[0]['id'], 'type'=>$tmpAnswers[0]['type'], 'text'=>$tmpAnswers[0]['text'], 'is_correct'=>$tmpAnswers[0]['is_correct']],
                        ['id' => $tmpAnswers[1]['id'], 'type'=>$tmpAnswers[1]['type'], 'text'=>$tmpAnswers[1]['text'], 'is_correct'=>$tmpAnswers[1]['is_correct']],
                    ]
                ];
            }
            else if($question->type == 'essay')
            {
                $this->questions[] = [
                    'id' => $question->id,
                    'type' => $question->type,
                    'text' => $question->text,
                ];
            }
        endforeach;

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

    public function updateExam()
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
        $exam = Exam::find($this->examId);

        $exam ->Update([
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
            'id' => null,
            'type' => '',    // Question type (mcq, essay, true_false)
            'text' => '',    // Question text
            'answers' => [
                ['id' => null, 'type' => 'normal_text', 'text' => '', 'is_correct' => false],
                ['id' => null, 'type' => 'normal_text', 'text' => '', 'is_correct' => false],
                ['id' => null, 'type' => 'normal_text', 'text' => '', 'is_correct' => false],
                ['id' => null, 'type' => 'normal_text', 'text' => '', 'is_correct' => false],
            ],
        ];
    }

    public function updated($propertyName)
    {
        foreach ($this->questions as $index => $question) {
            if ($question['type'] === 'true_false') {
                // Reset answers for true_false questions
                $this->questions[$index]['answers'] = [
                    ['type' => 'normal_text', 'text' => 'True', 'is_correct' => $this->questions[$index]['answers'][0]['is_correct'] ?? false],
                    ['type' => 'normal_text', 'text' => 'False', 'is_correct' => $this->questions[$index]['answers'][1]['is_correct'] ?? false],
                ];
            } elseif ($question['type'] === 'essay') {
                // Reset answers for essay questions
                $this->questions[$index]['answers'] = [
                    ['type' => 'normal_text', 'text' => 'no answer yet', 'is_correct' => true],
                ];
            } elseif ($question['type'] === 'mcq') {
                // Reset answers for mcq questions with 4 empty options
                $this->questions[$index]['answers'] = [
                    ['type' => 'normal_text', 'text' => '', 'is_correct' => false],
                    ['type' => 'normal_text', 'text' => '', 'is_correct' => false],
                    ['type' => 'normal_text', 'text' => '', 'is_correct' => false],
                    ['type' => 'normal_text', 'text' => '', 'is_correct' => false],
                ];
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
            $this->validate(
                [
                "questions.$index.text" => 'required',
                "questions.$index.type" => 'required',
                ],
                [
                "questions.$index.text.required" => "The text field for question #".($index+1)." is required.",
                "questions.$index.type.required" => "The type field for question #".($index+1)." is required.",
                ]
            );
            $updateOrCreateQuestion = Question::updateOrCreate(
                [
                    'id' => $question['id'],
                ],
                [
                    'exam_id' => $this->examId,
                    'type' => $question['type'],
                    'text' => $question['text'],
                ],
            );

            if (isset($question['answers']) && is_array($question['answers']) && $question['type'] !== 'essay') {
                foreach ($question['answers'] as $answerIndex => $answer) {
                    // Handle image uploads if the answer type is 'image_path'
                    if ($answer['type'] === 'image_path') {
                        // Save the uploaded file and get the path
                        if(!empty($this->uploadedImages[$index][$answerIndex]))
                        {
                            $imagePath = $this->uploadedImages[$index][$answerIndex]->store('/images/answers');
                            $answerText = $imagePath;
                            if(!empty($answer['text']))
                            {
                                Storage::delete($answer['text']);
                            }
                        }else{
                            $answerText = $this->questions[$index]['answers'][$answerIndex]['text'];
                        }
                    } else {
                        $answerText = $answer['text'];
                    }

                    if ($question['type'] === 'true_false') {
                        // Check if this question already has true/false answers
                        $existingAnswer = Answer::where('question_id', $updateOrCreateQuestion->id)
                            ->where('text', $answerText)
                            ->first();

                        if (!$existingAnswer) {
                            // Only create the answer if it doesn't exist
                            Answer::create([
                                'question_id' => $updateOrCreateQuestion->id,
                                'type' => $answer['type'],
                                'text' => $answerText,
                                'is_correct' => $answer['is_correct'],
                            ]);
                        }
                    } else {
                        // For other question types, just update or create the answer
                        Answer::updateOrCreate(
                            [
                                'id' => $answer['id'],
                            ],
                            [
                                'question_id' => $updateOrCreateQuestion->id,
                                'type' => $answer['type'],
                                'text' => $answerText,
                                'is_correct' => $answer['is_correct'],
                            ]
                        );
                    }
                }
            }

        }


        // Optionally, you can reset the questions array or show a success message
        $this->questions = [];
        session()->flash('message', 'Questions and answers saved successfully!');
    }

    public function deleteQuestion($questionIndex)
    {
        if (!empty($this->questions[$questionIndex]['id'])) {
            $question = Question::findOrFail($this->questions[$questionIndex]['id']);

            if ($this->questions[$questionIndex]['type'] !== 'essay' ) {
                foreach ($this->questions[$questionIndex]['answers'] as $answer) {
                    if ($answer['type'] === 'image_path' && !empty($answer['text'])) {
                        Storage::delete($answer['text']);
                    }
                }
            }

            $question->forceDelete();
        }

        unset($this->questions[$questionIndex]);
        $this->questions = array_values($this->questions); // Re-index array
    }

    public function render()
    {
        return view('livewire.update-exam-form');
    }
}
