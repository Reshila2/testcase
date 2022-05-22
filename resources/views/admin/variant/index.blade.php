@extends('layouts.admin_layout')

@section('title', 'All topics')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Все доступные варианты</h2>
                    </div>
                    <div class="pull-right" style="float: right">
                        <a class="btn btn-primary" href="{{ route('variant.create') }}"> Добавить вариант</a>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>
                                Id Вопрос
                            </th>
                            <th style="width: 5%" >
                                Вопрос
                            </th>

                            <th>
                                Варианты ответа
                            </th>


                            <th style="width: 22%">Действия
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($variant as  $key =>$variant)

                            <tr>

                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{ $variant['question_id'] }}
                                </td>
                                <td>
                                {{ $variant->question['title'] }}

                                </td>
                                <td>
                                    {{ $variant['answer_variant'] }}
                                </td>


                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('variant.edit', $variant['id']) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Редактировать
                                    </a>
                                    <form action="{{ route('variant.destroy', $variant['id']) }}" method="POST"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash">
                                            </i>
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
