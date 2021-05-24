<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    public function flower()
    {
        return $this->hasOne(Flower::class, 'id', 'flower_id');
    }
}
