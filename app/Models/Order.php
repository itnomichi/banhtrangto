<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Notifications\NotifyToSlackChannel;

class Order
{
    public function save($data)
    {
        try {
            $id = $this->insertOrder($data);
        } catch (\Throwable $e) {
            throw $e;
        }
        return $id;
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

    private function getOrderById($id)
    {
        try {
            $data = DB::table('orders')
                ->leftJoin('images', 'orders.img_id', '=', 'images.id')
                ->select('orders.*', 'images.img_title', 'images.img_money')
                ->where([['orders.id', '=', $id], ['orders.delete_flg', '=', '0']])
                ->first();
        } catch (\Throwable $e) {
            throw $e;
        }
        return $data;
    }

    public function sendOrderToSlack($id)
    {
        try {
            $order = $this->getOrderById($id);
            return (new Notify())->notify(new NotifyToSlackChannel($order));
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
