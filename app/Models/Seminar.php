<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;
    protected $table = 'tb_jenisseminar';
    protected $primaryKey = 'kode_seminar';
    public $incrementing = false;
    protected $fillable = ['kode_seminar', 'jenis_seminar'];
    public $timestamps = false;
}
