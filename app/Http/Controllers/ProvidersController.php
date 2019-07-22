<?php

namespace App\Http\Controllers;

use App\Models\ProviderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProvidersController extends Controller
{

    /**
     * @SWG\Post(
     *     path="/provider/load",
     *     summary="Cargar proveedores al sistema",
     *     tags={"Providers"},
     *
     *     @SWG\Response(
     *         response=200,
     *         description="Generar cargue correcto de los proveedores."
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function load(Request $request)
    {

        $archivoBase = json_decode(Storage::disk('local')->get('recursos\providers-merqueo.json'), true);
        $model = new ProviderModel();

        try{

            if($model->newLoad($archivoBase))
                return response()->json(['statusProcess' => 'Cargue correcto!']);

            return response()->json(['statusProcess' => 'Cargue no realizado!']);

        }catch (Exception $e){
            return response(null, 500)->json(['statusProcess' => $e->getMessage()]);
        }

    }


    /**
     * @SWG\Get(
     *     path="/provider/all",
     *     summary="Mostrar listado completo de proveedores en el sistema",
     *     tags={"Providers"},
     *     @SWG\Response(
     *         response=200,
     *         description="Mostrar todos los proveedores registrados."
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function all()
    {
        $data = (new ProviderModel())->get();
        return response()->json($data);
    }

    /**
     * @SWG\Get(
     *     path="/provider/{id}",
     *     summary="Mostrar datos de un provedor especifico",
     *     tags={"Providers"},
     *     operationId="find",
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         description="identificador del proveedor",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *          response=200,
     *          description="successfull"
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     *
     */
    public function find($idProduct)
    {

        $idProduct = (int) $idProduct;
        $data = (new ProviderModel())->find($idProduct);
        return response()->json($data);

    }

}
