<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviewer2 extends Model
{
    use HasFactory;
    protected $table = 'reviewer2';
    protected $primaryKey = 'submission';
    public $incrementing = false;
    public $timestamps = false;
}
