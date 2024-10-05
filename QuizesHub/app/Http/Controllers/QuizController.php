<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuizRequest;
use App\Http\Requests\FeedBackRequest;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Exam;
use App\Models\Admin\ExamUser;
use App\Models\Admin\feedBack;
use App\Models\Admin\User;
use Carbon\Carbon;

class QuizController extends Controller
{
    public function quiz($examId)
    {
        $userId = Auth::id();
        $exam = Exam::findorfail($examId);

        return view('quiz.quiz', compact('userId', 'exam'));
    }

    public function submit(QuizRequest $request, $examId)
    {
        $userId = Auth::id();
        $exam = Exam::findorfail($examId);
        $score = 0;
        $userAnswers = $request->validated();
        $user_answers = [];

        // Loop through each question in the exam
        foreach ($exam->questions as $question) {
            // Get the user's answer for the current question
            $userAnswerId = isset($userAnswers['question'][$question->id]) ? $userAnswers['question'][$question->id] : null;
            $user_answers[] = $userAnswerId;

            // For MCQ and True/False, compare the user's answer with the correct one
            if ($question->type == 'mcq' || $question->type == 'true_false') {
                $correctAnswer = $question->answers()->where('is_correct', 1)->first();
                if ($correctAnswer && $correctAnswer->id == $userAnswerId) {
                    $score++; // Increment score if the answer is correct
                }
            }

            // For essay-type questions, you can assign manual grading or points for submission
            elseif ($question->type == 'essay') {
                if (!empty($userAnswerId)) {
                    $score++; // Giving 1 point for submitting an essay answer
                }
            }
        }

        if(!ExamUser::where('user_id', $userId)->where('exam_id', $examId)->exists()) {
            $initScore = Auth::user()->score;
            Auth::user()->score = $initScore + $score + intval($request->timer_input / 60);
            Auth::user()->save();
        }



        ExamUser::create([
            'user_id' => Auth::id(),
            'exam_id' => $examId,
            'score' => $score,
            'total_score' => count($exam->questions->toArray()),
            'completion_time' => intval($request->timer_input / 60),
        ]);


        return view('quiz.result', compact('userId', 'exam', 'score', 'user_answers'));
    }

    public function feedBack($examId)
    {
        $userId = Auth::id();

        return view('quiz.feed-back', compact('examId', 'userId'));
    }

    public function storeFeedBack(FeedBackRequest $request, $examId)
    {
        feedBack::create([
            'user_id' => Auth::id(),
            'exam_id' => $examId,
            'rating' => $request->rating,
            'comments' => $request->comment,
        ]);

        return redirect()->back()->with('message', 'Message Sended Successfully');
    }
}
