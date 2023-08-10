<?php

use App\Models\Reviewer1;
use App\Models\Reviewer2;

function namaReviewer1($id)
{
    $nama = Reviewer1::select('nama')->where('submission', $id)->pluck('nama')->first();
    if ($nama == null) {
        return "Reviewer Belum Diisi";
    }
    return $nama;
}
function namaReviewer2($id)
{
    $nama = Reviewer2::select('nama')->where('submission', $id)->pluck('nama')->first();
    if ($nama == null) {
        return "Reviewer Belum Diisi";
    }
    return $nama;
}
