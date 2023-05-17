<?php

namespace Modules\admin\Http\Controllers;

use App\Http\Controllers\RestController;

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


}

