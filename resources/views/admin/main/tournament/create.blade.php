@extends('layouts.admin.main')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление турнира</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.tournament.index') }}">Турниры</a>
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
                        <form action="{{ route('admin.main.tournament.store') }}" method="POST">
                            @csrf
                            <div class="form-group w-25">
                                <label class="mt-2">Название турнира</label>
                                <input type="text" class="form-control" name="title" placeholder="Название турнира"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror

                                <label class="mt-2">Возрастная группа</label>
                                <select class="form-control mt-2" name="class" aria-label="Default select example">
                                    <option value="" selected>Выберите возрастную группу</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class }}" {{ $class == old('class') ? 'selected' : '' }}>
                                            {{ $class }}</option>
                                    @endforeach
                                </select>

                                <label class="mt-2">Название города</label>
                                <input type="text" class="form-control" name="city" placeholder="Название города"
                                    value="{{ old('city') }}">
                                @error('city')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror

                                <label class="mt-2">Дата начала турнира</label>
                                <input type="date" class="form-control" name="start_date" placeholder="Название города"
                                    value="{{ old('start_date') }}">
                                @error('start_date')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror

                                <label class="mt-2">Дата окончания турнира</label>
                                <input type="date" class="form-control" name="end_date" placeholder="Название города"
                                    value="{{ old('end_date') }}">
                                @error('end_date')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Добавить">
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
