<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function setFromRequest()
    {
        $this->name = request('name');
        $this->slug = request('slug');
        $this->description = request('description');
    }
}
