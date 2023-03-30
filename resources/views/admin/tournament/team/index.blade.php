@extends('layouts.admin.tournament')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Команды</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.tournament.index', $tournament->id) }}">Главная</a></li>
                            <li class="breadcrumb-item active">Команды</li>
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
                    <div class="col-3 mb-3">
                        <a href="{{ route('admin.tournament.team.create', $tournament->id) }}" type="button"
                            class="btn btn-block btn-outline-primary">Добавить команду</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            @foreach ($groups as $group)
                                <div class="col-sm-7 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div class="card-body">
                                            <a
                                                href="{{ route('admin.tournament.group.show', [$tournament->id, $group->id]) }}">
                                                <h5 class="title">{{ $group->title }}</h5>
                                            </a>
                                            @foreach ($group->teams as $team)
                                            <div class="col-sm-6 d-flex align-items-center">
                                                <a
                                                    href="{{ route('admin.tournament.team.show', [$tournament->id, $team->id]) }}">
                                                    <h5>{{ $team->title }}</h5>
                                                </a>

                                                <a href="{{ route('admin.tournament.team.edit', [$tournament->id, $team->id]) }}"
                                                    class="text-success ml-3 mr-2"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{ route('admin.tournament.team.destroy', [$tournament->id, $team->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
