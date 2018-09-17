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
            try {
                unset($data['id']);

                $img_file = null;
                if (isset($data['img_file'])) {
                    $img_file = $data['img_file'];
                    unset($data['img_file']);
                }
                $id = DB::table('images')->insertGetId($data);

                if (isset($img_file)) {
                    $img_path = public_path('images');
                    $path = Storage::putFileAs(
                        $img_path, $img_file, "$id.jpg"
                    );
                }

                DB::commit();
            } catch (\Throwable $e) {
                DB::rollback();
                throw $e;
            }
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    private function updateImage($data)
    {
        try {

        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
