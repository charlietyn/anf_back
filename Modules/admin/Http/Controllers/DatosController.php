<?php

namespace Modules\admin\Http\Controllers;

use App\Http\Controllers\RestController;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Modules\admin\Models\Datos;

class DatosController extends RestController
{


    /**
     *  DatosController constructor.
     */
    public function __construct()
    {
        $classnamespace='Modules\admin\Models\Datos';
        $classnamespaceservice='Modules\admin\Services\DatosService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
    }

    public function index(Request $request)
    {
        $result = Datos::query()->get()->all();
        foreach ($result as $p) {
            $client = new Client();
            $res = $client->request('GET', 'https://api.nationalize.io', ['query' => ['name' => $p->nombre]]);
            $resp = json_decode($res->getBody()->getContents());
            $p->nationality=count($resp->country)>0?$resp->country[0]->country_id:"No tiene";
        }
        return $result;
    }

    function info(){
        $aver=Datos::query()->average('edad');
        $masc=Datos::query()->where(['sexo'=>'Masculino'])->count('id');
        $fem=Datos::query()->where(['sexo'=>'Femenino'])->count('id');
        $menor_age=Datos::query()->orderBy('edad','asc')->get(['nombre','apellidos'])->first();
        $mayor_age=Datos::query()->orderBy('edad','desc')->get(['nombre','apellidos'])->first();
        return response()->json(["promedio"=>$aver,"masculinos"=>$masc,"femeninos"=>$fem,"menor"=>$menor_age,"mayor"=>$mayor_age]);
    }

}

