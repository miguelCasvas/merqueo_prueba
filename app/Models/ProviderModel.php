<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProviderModel extends Model
{

    protected $table = 'providers';
    protected $fillable = ['id', 'name'];
    public $timestamps = false;

    public function loadProviders(array $data)
    {



    }

    public function newLoad(array $providers)
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $this->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $providers = current($providers);
        $providerSave = array();

        foreach ($providers as $provider) {
            $providerSave = [
                'id' => $provider['id'],
                'name' => $provider['name']
            ];

            
            $this->create($providerSave);

        }


        return true;
    }

}
