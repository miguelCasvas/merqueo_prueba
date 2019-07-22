<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * @SWG\Get(
     *     path="/orders/all",
     *     tags={"3. Orders"},
     *     summary="Mostrar listado completo de productos",
     *     @SWG\Response(
     *         response=200,
     *         description="Mostrar todos los productos."
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function all()
    {
        $data = (new ProductModel())->get(['id', 'name', 'stock'])->toArray();
        return response()->json($data);
    }

}
