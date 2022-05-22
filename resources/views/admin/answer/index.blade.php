@extends('layouts.admin_layout')

@section('title', 'All topics')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Выбранные ответы</h2>
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
                            <th style="width: 5%" >
                                Id
                            </th>
                            <th>
                                Ответ
                            </th>
                            <th>
                                Свой ответ
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($answer as  $key =>$answer)

                            <tr>

                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{ $answer['id'] }}
                                </td>
                                <td>
                                    {{ $answer['answer_text'] }}
                                </td>
                                <td>
                                    {{ $answer['own_variant'] }}
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
