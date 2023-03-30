@extends('layouts.admin.main')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Турниры</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Турниры</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-2 mb-3">
                        <a href="{{ route('admin.main.tournament.create') }}" type="button"
                            class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap table-striped">
                                    <thead>
                                        <tr>
                                            <th>Название</th>
                                            <th>Возрастная группа</th>
                                            <th>Город</th>
                                            <th>Начало турнира</th>
                                            <th>Конец турнира</th>
                                            <th colspan="3" class="text-center">Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($tournaments as $tournament)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('admin.tournament.index', $tournament->id) }}">{{ $tournament->title }}</a>
                                                </td>
                                                <td>{{ $tournament->class }}</td>
                                                <td>{{ $tournament->city }}</td>
                                                <td>{{ $tournament->start_date }}</td>
                                                <td>{{ $tournament->end_date }}</td>
                                                <td class="text-center"><a
                                                        href="{{ route('admin.main.tournament.show', $tournament->id) }}"><i
                                                            class="far fa-eye"></i></a></td>
                                                <td class="text-center"><a
                                                        href="{{ route('admin.main.tournament.edit', $tournament->id) }}"
                                                        class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                                <td class="text-center">
                                                    <form action="{{ route('admin.main.tournament.destroy', $tournament->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="border-0 bg-transparent">
                                                            <i class="fas fa-trash text-danger" role="button"></i>
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
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
