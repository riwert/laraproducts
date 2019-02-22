<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    
    public function setFromArray(array $price)
    {
        $this->name = $price['name'];
        $this->value = str_replace(',', '.', $price['value']);
        $this->unit = $price['unit'];
    }
}
