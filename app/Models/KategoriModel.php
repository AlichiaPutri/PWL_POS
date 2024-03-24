<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany as RelationsHasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class KategoriModel extends Model
{
    protected $table = 'm_kategori';
    protected $primaryKey = 'kategori_id';

    protected $fillable = ['kategori_kode', 'kategori_nama'];
    
    public function barang(): RelationsHasMany
    {
        return $this->hasMany(BarangModel::class, 'barang_id', 'barang_id');
    }
}
