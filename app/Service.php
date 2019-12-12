<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'id_service', 'service_name',
    ];

    public function store()
    {
        return $this->hasMany(Store::class, 'service_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public $table = 'service';
    protected $primaryKey = 'id_service';
}
