<?php

namespace App\Models;

use App\Models\Seminar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurnal extends Model
{
   
    use HasFactory;
    protected $table = 'tb_jurnal';
    protected $primaryKey = 'submission';
    protected $fillable = ['submission','judul','nama','email','aviliasi','no_wa','kode_seminar','status','pembayaran','kehadiran','catatan'];
    public $timestamps = false;

    public function dataSeminar(){
        return $this->belongsTo(Seminar::class, 'kode_seminar');
    }
}
