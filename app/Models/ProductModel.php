<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductModel extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'description', 'stock', 'date'];


    public function newLoad(array $data)
    {

        $dataSave = array();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $this->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        $data = current($data);

        foreach ($data as $datum) {

            $dataSave = [
                'id' => $datum['id'],
                'name' => 'Producto ' . $datum['id'],
                'description' => 'Cargue de producto ' . $datum['id'] . ' '. date('Y-m-d H:i:s'),
                'stock' => $datum['quantity'],
                'date' => $datum['date']
            ];

            $this->create($dataSave);
        }

        return true;
    }

    public function getProductsFromInventary()
    {

        $columns = [
          't1.idProduct',
          't1.nameProduct',
          't2.stock AS stockOfProductFromInventary'
        ];

        $this->table = 'products AS t2';

        return

        $this
            ->select($columns)
            ->leftJoin('relOrdersProducts AS t1', 't1.idProduct', '=', 't2.id');


    }

    /**
     * Productos menos vendidos
     */
    public function getLessSoldProducts()
    {

        $modelOrder = new OrdersModel();
        $modelOrder->setTable('orders AS t0');
        $columns = [
            't1.idProduct',
            't1.nameProduct',
            't1.quantity'
        ];

        return
            $modelOrder
                ->select($columns)
                ->join('relOrdersProducts AS t1', 't0.id','=', 't1.idOrder')
                ->join('products AS t2', 't1.idProduct', '=', 't2.id')
                ->where('t0.deliveryDate', '=', '2019-03-01')
                ->orderBy('t1.quantity', 'ASC');


    }
}
