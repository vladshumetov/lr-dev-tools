<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Status;
use Illuminate\Http\Request;

class WorldsController extends Controller
{
    public function index()
    {
        $seed = seed();
        $title = "Игровые миры";
        $maps = Map::all();
        return view('categorys.worlds.index', compact('title', 'maps', 'seed'));
    }

    public function create_world()
    {
        $token = $_POST["_token"];
        $name = $_POST["map_name"];
        $desc = $_POST["map_desc"];

        $map = new Map();
        $map->name = $_POST["map_name"];
        $map->description = $_POST["map_desc"];
        $map->map_image = "";
        $map->background_map_image = "";
        $map->max_mob = 3;
        $map->save();

        $id = $map->id;

        $new_map = "
         <div class='col'>
             <form action='/worlds/world_edit' method='post'>
                 <input type='hidden' name='_token' value='$token' />
                     <div class='card'>
                         <input type='hidden' name='id_map' value='$id'>
                         <div class='card-header'>
                             Разрабатываемые
                             <div class='card-header__delete'>
                                     <a class='card-header__delete__link' href='#' title='Удалить карту'>
                                         <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                             <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                             <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                         </svg>
                                     </a>
                                 </div>
                             </div>
                             <img src='/img/maps/none.png' class='card-img-top' alt='...'>
                             <div class='card-body'>
                                 <h5 class='card-title'>$name</h5>
                                 <p class='card-text'>$desc</p>
                             </div>
                             <input type='submit' class='btn btn-primary' value='Редактировать'>
                         </div>
                     </form>
                 </div>
         ";

        return $new_map;
    }

    public function world_edit()
    {
        $seed = seed();
        $id_map = $_POST["id_map"];
        $map = Map::where('id', $id_map)->get()[0];
        $title = "Редактирование карты " . $map->name;

        $status = Status::all();

        return view('categorys.worlds.world_edit', compact('title', 'map', 'seed', 'status'));
    }

    public function world_edit_finish(Request $request)
    {
//        $seed = seed();
//        $id_map = $_POST['id_map'];
//        $map = Map::where('id', $id_map)->get()[0];
//
//        map_images($request, $map->id);
//
//        $map->name = $_POST['map_name'];
//        $map->description = $_POST['map_description'];
//        $map->max_mob = $_POST['range_mob'];
//        $map->save();
//        $title = "Редактирование карты " . $map->name;
            return $_POST;
//        return view('categorys.worlds.world_edit', compact('title', 'map', 'seed'));
    }
}

function map_images($request, $map_id, $delete = 0) {

    $map = Map::find($map_id);
    //names
    if ($request->image_map)
    {
        $file_one = $request->image_map->getClientOriginalName();
        $file_one = explode('.', $file_one);
        $image_name = "$map_id"."_map.".$file_one[1];

        if ($delete)
        {
            if (count(scandir(public_path("img/maps/$map->id"))) > 2)
            {
                $files = scandir(public_path("img/maps/$map->id"));
                for($i = 2; $i < count(scandir(public_path("img/maps/$map->id"))); $i++)
                {
                    unlink(public_path("img/maps/$map->id/$files[$i]"));
                    var_dump('Файл: ', $files[$i], ' удален');
                }
            }
        }

        $request->image_map->move(public_path("img/maps/$map_id"), $image_name);
        $map->map_image = "/img/maps/$map_id/".$image_name;
    }

    if ($request->background_map)
    {
        $file_second = $request->background_map->getClientOriginalName();
        $file_second = explode('.', $file_second);
        $background_name = "$map_id"."_map.".$file_second[1];

        if ($delete)
        {
            if (count(scandir(public_path("img/maps/$map->id"))) > 2)
            {
                $files = scandir(public_path("img/maps/$map->id"));
                for($i = 2; $i < count(scandir(public_path("img/maps/$map->id"))); $i++)
                {
                    unlink(public_path("img/maps/$map->id/$files[$i]"));
                    var_dump('Файл: ', $files[$i], ' удален');
                }
            }
        }

        $request->background_map->move(public_path("img/maps/backgrounds/$map_id"), $background_name);
        $map->background_map_image = "/img/maps/backgrounds/$map_id/".$background_name;
    }

    $map->save();
}

function seed() {
    $random1 = random_int(PHP_INT_MIN, PHP_INT_MAX);
    $random2 = random_int(PHP_INT_MIN, PHP_INT_MAX);
    $random3 = random_int(PHP_INT_MIN, PHP_INT_MAX);
    $seed = ($random1 / $random2) + ($random1 / $random3) - ($random3 / $random1) - ($random3 / $random2 / $random1)
        + ($random1 / $random2 / $random3) - $random2 - $random3 + $random1;
    return $seed;
}
