<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CommentRequest;
use App\Models\Admin\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        // validate running
        Comment::create([
            'user_id' => Auth::id(),
            'question_id' => $request->question_id,
            'parent_id' => $request->parent_id,
            'comment_text' => $request->comment_text,
        ]);

        return redirect()->back()->with('message', 'Comment Sended Successfuly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $comment = Comment::findorfail($id);
        return $comment;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $comment = Comment::findorfail($id);
        return $comment;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, string $id)
    {
        // validate running 

        $comment = Comment::findorfail($id);
        
        $comment->comment_text = $request->comment_text;
        
        $comment->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findorfail($id);
        $comment->SoftDeletes();
    }
}
