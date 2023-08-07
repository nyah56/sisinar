<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviewer1 extends Model
{
    use HasFactory;
    protected $table = 'reviewer1';
    protected $primaryKey = 'submission';
    public $incrementing = false;
    public $timestamps = false;
}
