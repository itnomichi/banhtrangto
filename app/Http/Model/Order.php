<?php

namespace App\Model;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Order
{
    public function save($data)
    {
        try {
            $id = $this->insertOrder($data);
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    private function insertOrder($data)
    {
        try {

            DB::beginTransaction();
            $data['ord_no'] = uniqid();
            $id = DB::table('orders')->insertGetId($data);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
        return $id;
    }

    private function sendOrderToZalo($id)
    {

    }
}
