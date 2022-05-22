<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Variant;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variant = Cache::orderBy('created_at', 'DESC')->get();
        return view('admin.variant.index',[
            'variant'=>$variant
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = Question::orderBy('created_at', 'desc')->get();

        return view('admin.variant.create',[
            'question' => $question
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $variant = new Variant();
        $variant->answer_variant = $request->answer_variant;
        $variant->question_id=$request->question_id;
        $variant->other=$request->other;
        $variant->save();
        return redirect()->back()->withSuccess('Варианты успено добавлены!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Variant $variant)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Variant $variant,Question $question)
    {
        $question = Question::orderBy('created_at', 'desc')->get();
        return view('admin.variant.edit', [
            'question' => $question,
            'variant' => $variant
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variant $variant)
    {
        $variant->answer_variant=$request->answer_variant;
        $variant->question_id = $request->question_id;
        $variant->save();
        return redirect()->back()->withSuccess('Успешно обнавлен');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variant $variant)
    {
        $variant->delete();
        return redirect()->back()->withSuccess('Assignment removed successfully!');
    }
}
