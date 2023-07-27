<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;
    protected $table = 'tb_jurnal';
    protected $primaryKey = 'submission';
    protected $fillable = ['submission','judul','nama','email','aviliasi','no_wa','kode_seminar','status','pembayaran','catatan'];
    public $timestamps = false;

    public function dataSeminar(){
        return $this->belongsTo(Seminar::class, 'kode_seminar');
    }
}
