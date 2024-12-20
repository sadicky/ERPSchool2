<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cahier extends Model
{
    use HasFactory;
    protected $table="tbl_notes";
    protected $primaryKey = 'note_id';
}
