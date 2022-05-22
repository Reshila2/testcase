<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Variant;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
class AnswerController extends Controller
{
    public function index()
    {
        //вопросы будут показаны
    $question =  Question::all();
    $answer = Answer::orderBy('created_at', 'DESC')->get();
    return view('admin.answer.index',[
        'answer'=>$answer,
        'question'=>$question
    ]);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //создание нового
    public function create()
    {
        $questions =  Question::all();
        $variants=Variant::all();
        return view('home',['questions' => $questions,
            'variants'=>$variants]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //хранение
    public function store(Request $request)
    {
            $answer = new Answer();
            $answer->answer_text = $request->answer_text;
            $answer->own_variant = $request->own_variant;
            $answer->save();
            return redirect('home')->with('status', 'успешно отправлен');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $solution)
    {
    }
    /**
     * Update the specified resource in storage.
     *

     */
    public function update(Request $request, Answer $answer)
    {
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
    }
}
