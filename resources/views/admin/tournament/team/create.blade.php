@extends('layouts.admin.tournament')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление команды</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.tournament.index', $tournament->id) }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.tournament.team.index', $tournament->id) }}">Команды</a></li>
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
                    <form action="{{ route('admin.tournament.team.store', $tournament->id) }}" method="POST">
                        @csrf
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="title" placeholder="Название команды"
                                value="{{ old('title') }}">
                            @error('title')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Выберите группу</label>
                            <select name="group_id"class="form-control">
                                
                                @foreach ($tournament->groups as $group)
                                    <option value="{{ $group->id }}"
                                        {{ $group->id == old('group_id') ? 'selected' : '' }}>
                                        {{ $group->title }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        {{-- <div class="form-group w-50">
                            <label>Игроки</label>
                            <select class="select2" name="player_ids[]" multiple="multiple"
                                data-placeholder="Выберите игроков" style="width: 100%;">
                                @foreach ($players as $player)
                                    <option
                                        {{ is_array(old('player_ids')) && in_array($player->id, old('player_ids')) ? 'selected' : '' }}
                                        value="{{ $player->id }}"> {{ $player->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
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
