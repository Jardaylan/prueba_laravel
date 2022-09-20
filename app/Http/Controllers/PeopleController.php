<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeoplePostRequest;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class PeopleController extends Controller
{
    public function index()
    {
        $peoples = People::all();

        return view('modules.people',compact('peoples'));
    }

    // Funcion para consultar el municipio segun el departamento (Se uso en todos los formularios)
    public function consultMunicipality(Request $request)
    {
        // Carga la informacion de los municipios segun el departamento seleccionado
        $json = File::get('json/colombia.json');
        $data = json_decode($json,true);
        $departament = $request->departament;

        $ciudades = array_filter($data, function ($var) use ($departament) {
            return ($var['departamento'] == $departament);
        });

        return $ciudades[key($ciudades)];
    }

    public function savePeople(PeoplePostRequest $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            $data['habeas_data'] = true;
            DB::table('people')->insert($data);

            return Redirect::back();

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
