<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Image
{
    public function save($data)
    {
        try {
            if ($data['id'] == 0) {
                return $this->insertImage($data);
            } else {
                return $this->updateImage($data);
            }
        } catch (\Throwable $e) {
            throw $e;
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
        return $id;
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
        return $data['id'];
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

    public function getSPImages()
    {
        try {
            $data = DB::table('images')
                ->select('*')
                ->where([['delete_flg', '=', '0'], ['img_type', '=', '1']])
                ->orderBy('id', 'desc')
                ->get();
            return $data;
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function getTPImages()
    {
        try {
            $tmp_data = DB::table('images')
                ->select('*')
                ->where([['delete_flg', '=', '0'], ['img_type', '=', '2']])
                ->orderBy('id', 'desc')
                ->get();

            $data = [];
            $group_data = [];
            foreach ($tmp_data as $image) {
                $group_data[] = $image;
                if (sizeof($group_data) == 3) {
                    $data[] = $group_data;
                    $group_data = [];
                }
            }

            if (sizeof($group_data) > 0) {
                $data[] = $group_data;
                $group_data = [];
            }

            return $data;
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function getGTImages()
    {
        try {
            $data = DB::table('images')
                ->select('*')
                ->where([['delete_flg', '=', '0'], ['img_type', '=', '3']])
                ->orderBy('id', 'desc')
                ->get();
            return $data;
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function getImageById($id)
    {
        try {
            $data = DB::table('images')
                ->select('*')
                ->where([['id', '=', $id], ['delete_flg', '=', '0']])
                ->first();
        } catch (\Throwable $e) {
            throw $e;
        }
        return $data;
    }
}
