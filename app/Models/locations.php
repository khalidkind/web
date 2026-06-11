<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class locations extends Model
{
    protected $table = 'locations';

    protected $primaryKey = 'id';

    protected $fillable = ['location_name','max_motorcycle','max_car','max_other'];

    public function getSisaSlot($id_jenis)
    {
        $terisi = transactions::where('id_lokasi', $this->id)
                                   ->where('id_jenis', $id_jenis)
                                   ->whereNull('keluar')
                                   ->count();

        if ($id_jenis == 1) {
            return $this->max_motorcycle - $terisi;
        } elseif ($id_jenis == 2) {
            return $this->max_car - $terisi;
        } else {
            return $this->max_other - $terisi; 
        }
    }
}
