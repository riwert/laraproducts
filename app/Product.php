<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductPrice;

class Product extends Model
{
    public function prices()
    {
        return $this->hasMany('App\ProductPrice');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function setFromRequest()
    {
        $this->name = request('name');
        $this->slug = request('slug');
        $this->description = request('description');
    }

    public function savePrices(array $prices)
    {
        $priceObjArray = [];

        foreach ($prices as $price) {
            $priceObj = (isset($price['id'])) ? ProductPrice::findOrFail((int) $price['id']) : new ProductPrice();
            $priceObj->setFromArray($price);
            $priceObjArray[] = $priceObj;
        }

        $this->prices()->saveMany($priceObjArray);
    }

    public function deletePrices(array $prices)
    {
        $priceIds = [];

        foreach ($prices as $price) {
            if (isset($price['id'])) {
                $priceIds[] = (int) $price['id'];
            }
        }

        $this->prices()->whereIn('id', $priceIds)->delete();
    }

    public function saveCategories(array $categories)
    {
        $this->categories()->sync($categories);
    }
}
