<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'description', 'stock', 'date'];


    public function newLoad(array $data)
    {

        $dataSave = array();
        $this->truncate();
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
