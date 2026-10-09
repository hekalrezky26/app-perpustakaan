<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanItem extends Model
{
    protected $fillable = [
        'loan_id',
        'book_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}