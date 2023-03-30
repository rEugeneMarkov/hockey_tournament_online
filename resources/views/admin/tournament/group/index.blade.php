@extends('layouts.admin.tournament')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Группы</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.tournament.index', $tournament->id) }}">Главная</a></li>
                            <li class="breadcrumb-item active">Группы</li>
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
                        <a href="{{ route('admin.tournament.group.create', $tournament->id) }}" type="button"
                            class="btn btn-block btn-outline-primary">Добавить группу</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            @foreach ($groups as $group)
                                <div class="col-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <a
                                                href="{{ route('admin.tournament.group.show', [$tournament->id, $group->id]) }}">
                                                <h5 class="card-title">{{ $group->title }}</h5>
                                            </a>
                                            <p class="card-text"></p>
                                            {{-- @foreach ($group->teams as $team)
                                            <p class="card-text">{{ $team->title }}</p>
                                            @endforeach --}}
                                            <div>
                                                <a class="btn btn-outline-success btn-sm col-sm-4 mb-3 mb-sm-2"
                                                    href="{{ route('admin.tournament.group.edit', [$tournament->id, $group->id]) }}">Edit</a>
                                                <form
                                                    action="{{ route('admin.tournament.group.destroy', [$tournament->id, $group->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm col-sm-4 mb-3 mb-sm-0">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
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
