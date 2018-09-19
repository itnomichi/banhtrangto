<?php

namespace App\Model;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Image
{
    public function save($data)
    {
        try {
            if ($data['id'] == 0) {
                $this->insertImage($data);
            } else {
                $this->updateImage($data);
            }
        } catch (\Throwable $e) {

        }
    }

    private function insertImage($data)
    {
        try {
            DB::beginTransaction();
            unset($data['id']);

            $img_file = null;
            if (isset($data['img_file'])) {
                $img_file = $data['img_file'];
                $img_ext = $img_file->getClientOriginalExtension();
                $data['img_ext'] = $img_ext;
                unset($data['img_file']);
            }
            $id = DB::table('images')->insertGetId($data);

            if (isset($img_file)) {

                $img_path = public_path('images');
                $path = $img_file->move(
                    $img_path, "$id.$img_ext"
                );
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    private function updateImage($data)
    {
        try {
            DB::beginTransaction();

            $img_file = null;
            if (isset($data['img_file'])) {
                $img_file = $data['img_file'];
                $img_ext = $img_file->getClientOriginalExtension();
                $data['img_ext'] = $img_ext;
                unset($data['img_file']);
            }
            DB::table('images')
                ->where([['id', '=', $data['id']], ['delete_flg', '=', '0']])
                ->update($data);

            if (isset($img_file)) {
                $img_path = public_path('images');
                $path = $img_file->move(
                    $img_path, $data['id'] . ".$img_ext"
                );
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function getAllImages()
    {
        try {
            $data = DB::table('images')
                ->select('*')
                ->where('delete_flg', '=', '0')
                ->orderBy('id', 'desc')
                ->get();
            return $data;
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
