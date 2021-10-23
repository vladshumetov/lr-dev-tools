@extends('layouts.app')

@section('content')

    <div class="container">
{{--        <div class="alert alert-primary" role="alert">--}}
{{--            Выберите карту и действия с ними.--}}
{{--        </div>--}}
        <div class="category">
            <h1 class="category__title">Карты</h1>
            <div class="menu" style="text-align: center">
                <input type="button" value="Новая карта" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <input onclick="location.href='#'" type="button" value="Мобы" class="btn btn-primary">
                <input id="pers_temp" type="button" value="Персонажи" class="btn btn-primary">
                <input onclick="location.href='/'" type="button" value="<< Назад" class="btn btn-primary">
            </div>
            <div class="row row-cols-3 row-cols-md-3 g-4" id="cards">
            @for($i = 0; $i < count($maps); $i++)
                <div class="col">
                    <form action="{{route('world_edit')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="card">
                            <input type="hidden" name="id_map" value="{{$maps[$i]->id}}">
                            <div class="card-header">
                                {{__('Разрабатываемые')}}
                                <div class="card-header__delete">
                                    <a class="card-header__delete__link" href="#" title="Удалить карту">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            @if($maps[$i]->map_image != '')
                                <img src="{{$maps[$i]->map_image}}?dummy={{$seed}}" class="card-img-top" alt="...">
                            @else
                                <img src="/img/maps/none.png" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{$maps[$i]->name}}</h5>
                                <p class="card-text">{{$maps[$i]->description}}</p>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Редактировать">
                        </div>
                    </form>
                </div>
            @endfor
            </div>
        </div>
    </div>

    <div class="pagination" style="margin-top: 1%; justify-content: center;">
        <nav aria-label="..." style="text-align: center">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item" aria-current="page">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="create_world">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Создание новой карты</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning" role="alert">
                            Введите не полные настройки карты. <br>Дальнейшая разработка карты ведется в редакторе.
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Название карты</label>
                            <input type="text" class="form-control" id="map_name" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Изначально карта не будет введена на сервер пока она не будет выпущена в релиз.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Описание</label>
                            <input type="text" class="form-control" id="map_desc" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Выход</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
