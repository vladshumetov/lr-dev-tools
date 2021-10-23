@extends('layouts.app')

@section('content')
    <div class="text" style="position: absolute;text-align: center; left: 50%; top: 50%; transform:translate(-50%, -50%);">
        <h1>Добро пожаловать в игровой редактор игры!</h1>
        <input onclick="location.href='#'" type="button" value="База данных" class="btn btn-primary">
        <input onclick="location.href='{{route('worlds')}}'" type="button" value="Игровой мир" class="btn btn-primary">
        <input onclick="location.href='#'" type="button" value="Персонажи" class="btn btn-primary">
        <input onclick="location.href='#'" type="button" value="Экипировка" class="btn btn-primary">
        <input onclick="location.href='#'" type="button" value="Квесты" class="btn btn-primary">
        <input onclick="location.href='#'" type="button" value="Магазин" class="btn btn-primary">
        <input onclick="location.href='#'" type="button" value="Сервер" class="btn btn-primary" disabled>
        <input onclick="location.href='#'" type="button" value="Консоль" class="btn btn-primary" disabled>
    </div>
@endsection
