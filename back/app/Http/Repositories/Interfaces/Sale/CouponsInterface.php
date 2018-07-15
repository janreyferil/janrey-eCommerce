<?php

namespace App\Http\Repositories\Interfaces\Sale;

interface CouponsInterface {

    public function all();

    public function single($id);

    public function add(array $data);

    public function change(array $data,$id);

    public function delete($id);
    
}


