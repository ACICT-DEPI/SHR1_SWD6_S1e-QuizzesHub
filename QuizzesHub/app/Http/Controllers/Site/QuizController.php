<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\QuizRequest;
use App\Http\Requests\FeedBackRequest;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Exam;
use App\Models\Admin\ExamUser;
use App\Models\Admin\feedBack;
use App\Models\Admin\User;
use App\Models\Admin\Answer;
use Carbon\Carbon;
use App\Models\Admin\AnswerQuestionUser;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function quiz($examId)
    {
        if(Auth::user()->score < 10) {
            Session::flash('message', 'Your action was successful!');
            return redirect()->back()->with('message', 'you don\'t have enough points');
        }
        $userId = Auth::id();
        $exam = Exam::findorfail($examId);

        return view('quiz.quiz', compact('userId', 'exam'));
    }

    public function submit(QuizRequest $request, $examId)
    {
        if (Session::has('test')) {
            // إذا تم تحديث الصفحة، إعادة توجيه المستخدم
            $exam = Exam::findorfail($examId);
            return view('quiz.show', compact('exam'));
        }
    
        // إذا كانت الصفحة تم تحميلها للمرة الأولى، ضع علامة على الجلسة
        Session::flash('test', true);
        Session::flash('submited', true);
        session(['submited'=>'yes']);

        $userId = Auth::id();
        $exam = Exam::findorfail($examId);
        $score = 0;
        $userAnswers = $request->validated();
        $user_answers = [];
        $selected_answers = [];

        $exam = Exam::find($examId); // Replace $examId with the actual exam ID
        $answers_in_site = Answer::whereHas('question', function ($query) use ($exam) {
            $query->where('exam_id', $exam->id);
        })->where('is_correct', 1)->get();
        // dd(count($answers_in_site->toArray()));


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

            $selected_answers[$question->id] =  $userAnswerId;
        }

        $regard = -10;
        if($score > (count($exam->questions->toArray())*60/100)) {
            if(!ExamUser::where('user_id', $userId)->where('exam_id', $examId)->exists()) {
                $regard = $regard + 50;
            } else {
                $regard = $regard + 50 / ExamUser::where('user_id', $userId)->where('exam_id', $examId)->count();
            }
            $regard = $regard + intval($request->timer_input / 60) + $score;
        } else {
            $regard = $regard - 30;
        }

        $regard = intval($regard);

        $exam_user_id = ExamUser::create([
            'user_id' => Auth::id(),
            'exam_id' => $examId,
            'score' => $score,
            'completion_time' => intval($exam->duration * 60) - intval($request->timer_input),
        ]);


        // dd()
        foreach($selected_answers as $question_id => $answer_id):
            AnswerQuestionUser::create([
                'user_id' => Auth::id(),
                'question_id' => $question_id,
                'selected_answer_id' => $answer_id,
                'exam_user_id' => $exam_user_id->id,
            ]);
        endforeach;
        $request = '';


        if(count($exam->questions->toArray()) == count($answers_in_site->toArray())) {
            Auth::user()->score = Auth::user()->score + $regard;
            Auth::user()->score = max(Auth::user()->score, 0);
            Auth::user()->save();

            return view('quiz.result', compact('userId', 'exam', 'score', 'user_answers', 'regard'));
        } else {
            $regard = 0;
            return view('quiz.result', compact('userId', 'exam', 'score', 'user_answers', 'regard'));
        }
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
        Auth::user()->score = Auth::user()->score + 10;
        Auth::user()->save();

        return redirect()->back()->with('message', 'Message Sended Successfully and you gained 10 points');
    }

    public function show($examId)
    {
        if(Auth::user()->score < 10) {
            Session::flash('message', 'Your action was successful!');
            return redirect()->back()->with('message', 'you don\'t have enough points');
        }
        $exam = Exam::findorfail($examId);
        return view('quiz.show', compact('exam'));
    }
}
