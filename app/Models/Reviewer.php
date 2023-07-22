<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    use HasFactory;
    protected $table = 'tb_reviewer';
    protected $primaryKey = 'id_reviewer';
    public $incrementing = false;
    protected $fillable = ['id_reviewer','nama'];
    public $timestamps = false;

}
