@extends('layouts.admin.tournament')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Арены</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.tournament.index', $tournament->id) }}">Главная</a></li>
                            <li class="breadcrumb-item active">Арены</li>
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
                        <a href="{{ route('admin.tournament.arena.create', $tournament->id) }}" type="button"
                            class="btn btn-block btn-outline-primary">Добавить арену</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            @foreach ($arenas as $arena)
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div class="card-body">
                                            <a
                                                href="{{ route('admin.tournament.arena.show', [$tournament->id, $arena->id]) }}">
                                                <h5 class="card-title">{{ $arena->name }}</h5>
                                            </a>
                                            <p class="card-text">{{ $arena->info }}</p>
                                            <div>
                                                <a class="btn btn-outline-success btn-sm col-sm-6 mb-3 mb-sm-2"
                                                    href="{{ route('admin.tournament.arena.edit', [$tournament->id, $arena->id]) }}">Edit</a>
                                                <form
                                                    action="{{ route('admin.tournament.arena.destroy', [$tournament->id, $arena->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm col-sm-6 mb-3 mb-sm-0">
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
