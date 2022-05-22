@extends('layouts.app')
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{url('store-form')}}" method="post" class="container mb-5">
            @csrf
            @foreach($questions as $key=>$question)
                <p name="own_variant" value="{{$question->title}}" style="margin-bottom: 0rem">{{++$key}}.{{$question->title}}</p>
                    @foreach($variants as $variant)
                        @if($variant->question_id == $question->id)
                                <div class="row">
                                    <label class="radio-inline">
                                        <div class="col-12">
                                        <input type="radio" id="smt-fld-1-2" onclick="showHideArea(this)"  value="{{ $variant['answer_variant'] }}"
                                               name="answer_text">{{$variant['answer_variant']}}
                                        </div>
                                    </label>
                                </div>
                        @endif
                    @endforeach
                    <div class="form-group" id="textArea" style="display: none">
                        <label for="exampleInputEmail1">Напишите свое</label>
                        <input type="text" name="own_variant" value="{{ $variant['other'] }}" class="form-control"
                               id="exampleInputEmail1" placeholder="Возможный ответ" >{{$variant['other']}}
                    </div>
            @endforeach
        <button type="submit" class="btn-primary">отправить</button>
    </form>
@endsection
