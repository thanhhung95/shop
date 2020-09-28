<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";

    public function produc_type(){
    	return $this->belongsTo('App\ProductType','id_type','id');
    }
    public function billdetail(){
    	return $this->hasMany('App\billdetail','id_product','id');
    }
}
