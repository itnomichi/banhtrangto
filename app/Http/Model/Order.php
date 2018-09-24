<?php

namespace App\Model;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Zalo\Zalo;
use Zalo\ZaloConfig;

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
            $this->sendOrderToZalo($id);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
        return $id;
    }

    public function getOrderById($id)
    {
        try {
            $data = DB::table('orders')
                ->select('*')
                ->where([['id', '=', $id], ['delete_flg', '=', '0']])
                ->first();
        } catch (\Throwable $e) {
            throw $e;
        }
        return $data;
    }

    private function sendOrderToZalo($id)
    {
        try {
            $oder = $this->getOrderById($id);
            $config = ZaloConfig::getInstance()->getConfig();
            $zalo = new Zalo($config);
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
