<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vehicletypes extends Model
{
    protected $table = 'vehicle_types';

    protected $primaryKey = 'id';

    protected $fillable = ['jenis', 'perjam_pertama', 'perjam_berikutnya', 'max_perhari'];
}
