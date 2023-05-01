<?php namespace App\Libraries;

class Flat_shipping{

    private $flatRate;

    public function getSettings(){
        $shipping_method_id = get_data_by_id('shipping_method_id','cc_shipping_method','code','flat');

        $table = DB()->table('cc_shipping_settings');
        $rate = $table->where('shipping_method_id',$shipping_method_id)->where('label','flat_rate_price')->get()->getRow();

        $this->flatRate = $rate->value;

        return $this;
    }


    public function calculateShipping(){
        return $this->flatRate;
    }





}