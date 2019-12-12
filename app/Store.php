<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'service_id', 'name_store', 'no_telp', 'alamat',
    ];

    public $table = 'store';
    protected $primaryKey = 'id_store';

    // public function transaksi()
    // {
    //     return $this->belongsTo(Transaksi::class, 'id_store');
    // }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_store');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
