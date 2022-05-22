<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $question = Question::orderBy('created_at', 'desc')->get();
        return view('admin.question.index', [
            'question' => $question
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.question.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question();
        $question->title = $request->title;
        $question->save();
        return redirect()->back()->withSuccess('Вопрос был успешно добавлен!');
    }
    /**
     * Display the specified resource.
     */

    public function show(Question $topic)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Question $question)
    {
        return view('admin.question.edit', [
            'question' => $question
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question  $question)
    {
        $question->title = $request->title;
        $question->save();

        return redirect()->back()->withSuccess('Вопрос был успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy(Question  $question)
    {
        $question->delete();
        return redirect()->back()->withSuccess('Вопрос была успешно удален!');
    }
}
