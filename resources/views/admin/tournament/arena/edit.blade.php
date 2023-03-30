@extends('layouts.admin.tournament')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление арены</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.tournament.arena.index', $tournament->id) }}">Арены</a>
                            </li>
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
                    <div class="col-12">
                        <form action="{{ route('admin.tournament.arena.update', [$tournament->id, $arena->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <label class="mt-2">Название арены</label>
                                <input type="text" class="form-control" name="name" placeholder="Название арены"
                                    value="{{ $arena->name }}">
                                @error('name')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror

                                <label class="mt-2">Информация о арене</label>
                                <textarea type="text" class="form-control" name="info" placeholder="Информация">{{ $arena->info }}</textarea>
                                @error('info')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                                

                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Изменить">
                            </div>
                        </form>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
