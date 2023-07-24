<?php

namespace App\Models;

use CodeIgniter\Model;

class kepribadianModel extends Model
{
    protected $table = 'kepribadian';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nomor_soal', 'gambar', 'soal', 'jawaban1', 'jawaban2', 'jawaban3', 'jawaban4', 'jawaban_benar'];

    function cari($katakunci)
    {
        //bisa spasi
        $builder = $this->table("kepribadian");
        $arr_katakunci = explode(" ", $katakunci);
        for ($x = 0; $x < count($arr_katakunci); $x++) {
            $builder->orlike('id', $arr_katakunci[$x]);
            $builder->orLike('soal', $arr_katakunci[$x]);
            $builder->orLike('jawaban1', $arr_katakunci[$x]);
            $builder->orLike('jawaban2', $arr_katakunci[$x]);
            $builder->orLike('jawaban3', $arr_katakunci[$x]);
            $builder->orLike('jawaban4', $arr_katakunci[$x]);
        }
        return $builder;
    }
}
