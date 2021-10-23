@extends('layouts.editor_app')

@section('content')
    <div class="container">
        <h1 class="category__title">{{$map->name}}</h1>
        <form class="world_editor_form border">
            <input type="hidden" name="id_map" value="{{$map->id}}" >
            <div class="world_editor">
                <form class="row g-3">
                    <div class="col-12">
                        <label for="inputAddress" class="world_editor_label">Название карты</label>
                        <input type="text" class="form-control" placeholder="Название карты" value="{{$map->name}}" name="map_name">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="world_editor_label">Описание карты</label>
                        <input type="text" class="form-control" placeholder="Описание карты" value="{{$map->description}}" name="map_description">
                    </div>

                    <label class="world_editor_label" id="label_range_mob">Количество мобов на локации: {{$map->max_mob}}</label>
                    <input type="range" class="form-range" min="1" max="3" step="1" value="{{$map->max_mob}}" id="range_mob" name="range_mob">

                    @if($map->map_image != "")
                        <div class="image__map">
                            <p>Локация</p>
                            <img src="{{$map->map_image}}?dummy={{$seed}}" alt="Фон во время боя в локации {{$map->name}}" style="margin: 2% 0; width: 413px;">
                        </div>
                    @else
                        <p style="margin: 2% 0">Нет картинки локации.</p>
                    @endif

                    @if($map->background_map_image != "")
                        <div class="image__map">
                            <p>Фон</p>
                            <img src="{{$map->background_map_image}}?dummy={{$seed}}" alt="Фон во время боя в локации {{$map->name}}" style="margin: 2% 0; width: 413px;"">
                        </div>
                    @else
                        <p style="margin: 2% 0">Нет фона.</p>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Загрузить картинку локации</label>
                        <input class="form-control" type="file" name="image_map">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Загрузить фон для локации</label>
                        <input class="form-control" type="file" name="background_map">
                    </div>

                    <select class="form-select" aria-label="Default select example" name="status">
                        @foreach($status as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
                    </select>

                    <div class="col-12" style="text-align: right; margin-top: 1%">
                        <input type="button" value="Отменить" class="btn btn-primary" onclick="location.href='{{route('worlds')}}'">
                        <input type="submit" value="Сохранить" class="btn btn-primary" id="save_map">
                    </div>
                </form>
            </div>
        </form>
    </div>
@endsection
