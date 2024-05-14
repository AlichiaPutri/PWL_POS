<?php

namespace App\Models;
use App\Models\KategoriModel;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BarangModel extends Model
{
    use HasFactory;
    public $table = "m_barang";
    protected $primaryKey = "barang_id";

    protected $fillable = [
        'kategori_id', 'barang_kode', 'barang_nama', 'harga_beli', 'harga_jual', 
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, "kategori_id", "kategori_id");
    }

    public function getImageAttribute($image)
    {
        return url('/storage/posts/' . $image);
    }
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($image) => url('/storage/posts/' . $image),
        );
    }

}