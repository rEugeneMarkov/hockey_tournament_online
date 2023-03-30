@extends('layouts.admin.main')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{ $tournament->title }}</h1>
                        <a href="{{ route('admin.main.tournament.edit', $tournament->id) }}" class="text-success"><i
                                class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('admin.main.tournament.destroy', $tournament->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.tournament.index') }}">Турниры</a></li>
                            <li class="breadcrumb-item active">{{ $tournament->title }}</li>
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
                    <div class="col-6">

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>Название</td>
                                            <td>{{ $tournament->title }}</td>
                                        </tr>
                                        <tr>
                                            <td>Возрастная группа</td>
                                            <td>{{ $tournament->class }}</td>
                                        </tr>
                                        <tr>
                                            <td>Город</td>
                                            <td>{{ $tournament->city }}</td>
                                        </tr>
                                        <tr>
                                            <td>Начало турнира</td>
                                            <td>{{ $tournament->start_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Конец турнира</td>
                                            <td>{{ $tournament->end_date }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- <div class="card-body table-responsive p-0 mb-5">
                            <h3>Команды</h3>
                            @foreach ($tournament->groups as $group)
                                <a href="{{ route('admin.group.show', $group) }}"
                                    class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                    <b>{{ $group->title }}</b>
                                </a>
                                @foreach ($group->teams as $team)
                                    <a href="{{ route('admin.team.show', $team) }}"
                                        class="list-group-item list-group-item-action d-flex gap-3 py-3"
                                        aria-current="true">
                                        {{ $loop->iteration }}. {{ $team->title }}
                                    </a>
                                @endforeach
                                <div class="list-group-item d-flex gap-3 py-3"></div>
                            @endforeach
                        </div> --}}
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
