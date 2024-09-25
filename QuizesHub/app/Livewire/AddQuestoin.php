<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin\Exam;
use App\Models\Admin\Question;
use App\Models\Admin\Answer;

class AddQuestoin extends Component
{
    public $exam; // Stores the current exam
    public $questions = []; // Temporary questions with answers

    public function mount(Exam $exam)
    {
        $this->exam = $exam;
        // Load existing questions and answers from the exam
        $this->questions = $exam->questions()->with('answers')->get()->toArray();
    }

    // Add a new question input
    public function addQuestion()
    {
        $this->questions[] = [
            'id' => null,
            'type' => 'mcq',
            'text' => '',
            'answers' => [
                ['type' => 'normal_text', 'text'=>'', 'is_correct'=>''],
            ],
        ];
    }

    // Add a new answer input to a specific question
    public function addAnswer($index)
    {
        $this->questions[$index]['answers'][] = ['type' => 'normal_text', 'text'=>'', 'is_correct'=>''];
    }

    // Remove a specific question
    public function removeQuestion($index)
    {
        if (!is_null($this->questions[$index]['id'])) {
            // If question exists in DB, delete it
            Question::find($this->questions[$index]['id'])->delete();
        }
        unset($this->questions[$index]);
        $this->questions = array_values($this->questions); // Reindex the array
    }

    // Remove a specific answer from a question
    public function removeAnswer($qIndex, $aIndex)
    {
        unset($this->questions[$qIndex]['answers'][$aIndex]);
        $this->questions[$qIndex]['answers'] = array_values($this->questions[$qIndex]['answers']); // Reindex
    }

    // Save questions and answers to the database
    public function saveQuestions()
    {
        foreach ($this->questions as $questionData) {
            if (isset($questionData['id'])) {
                // Update existing question
                $question = Question::find($questionData['id']);
                $question->update([
                    'type' => $questionData['type'],
                    'text' => $questionData['text'],
                ]);
            } else {
                // Create new question
                $question = $this->exam->questions()->create([
                    'type' => $questionData['type'],
                    'text' => $questionData['text'],
                ]);
            }

            // Save or update answers
            foreach ($questionData['answers'] as $answerData) {
                if (!empty($answerData['text'])) {
                    $question->answers()->updateOrCreate(
                        ['id' => $answerData['id'] ?? null],
                        ['type' => $answerData['type']],
                        ['text' => $answerData['text']],
                        ['is_correct' => $answerData['is_correct']],
                    );
                }
            }
        }

        // Emit success message
        session()->flash('message', 'Questions and answers saved successfully.');
    }

    public function render()
    {
        return view('livewire.add-questoin'); 
    }
}
