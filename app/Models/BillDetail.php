<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'billdetails';
    protected $guarded = ['*'];

    public function book()
    {
        return $this->belongsTo(Book::class,'bd_book_id');
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'bd_transaction_id');
    }
}
