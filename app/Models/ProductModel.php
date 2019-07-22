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

}
