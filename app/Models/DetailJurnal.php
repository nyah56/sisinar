<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailJurnal extends Model
{
    use HasFactory;
    protected $table = 'tb_detailjurnal';
    protected $primaryKey = 'submission';
    public $incrementing = false;
    protected $fillable = ['submission','id_reviewer','status'];
    public $timestamps = false;

    public function detailReviewer()  {
        return $this->belongsTo(Reviewer::class,'id_reviewer');
    }
}
