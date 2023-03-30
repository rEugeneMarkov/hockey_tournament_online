@extends('layouts.admin.tournament')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{ $group->title }}</h1>
                        <a href="{{ route('admin.tournament.group.edit', [$tournament->id, $group->id]) }}"
                            class="text-success"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('admin.tournament.group.destroy', [$tournament->id, $group->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.tournament.index', $tournament->id) }}">Главная</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.tournament.group.index', $tournament->id) }}">Группы</a></li>
                            <li class="breadcrumb-item active">{{ $group->name }}</li>
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
                                <section>
                                    <div>
                                        <h4>{{ $group->title }}</h4>
                                    </div>
                                </section>
                            </div>
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
