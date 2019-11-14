<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    const HOT_ON = 1;
    const HOT_OFF = 0;
    protected $status = [
        1 => [
            'name' => 'Public',
            'class' => 'label-danger'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'label-default'
        ]
    ];
    protected $hot = [
        1 => [
            'name' => 'Nổi bật',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'Không',
            'class' => 'label-default'
        ]
    ];
    public function getStatus()
    {
        return array_get($this->status,$this->book_active,'[N\A]');
    }
    public function getHot()
    {
        return array_get($this->hot,$this->book_hot,'[N\A]');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'book_category_id');
    }
    public function author()
    {
        return $this->belongsTo(Author::class,'book_author_id');
    }
}
