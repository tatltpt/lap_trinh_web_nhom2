<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = ['*'];
    protected $status = [
        2 => [
            'name' => 'Đã trả',
            'class' => 'label-success'
        ],
        1 => [
            'name' => 'Đang mượn',
            'class' => 'label-info'
        ],
        0 => [
            'name' => 'Chưa xủ lý',
            'class' => 'label-default'
        ]
    ];
    public function getStatus()
    {
        return array_get($this->status,$this->tr_status,'[N\A]');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'tr_user_id');
    }
}
