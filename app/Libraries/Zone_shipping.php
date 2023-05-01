<?php namespace App\Libraries;

class Zone_shipping{

    private $inDhakaPrice;
    private $outDhakaPrice;

    public function getSettings(){
        $shipping_method_id = get_data_by_id('shipping_method_id','cc_shipping_method','code','zone');

        $table = DB()->table('cc_shipping_settings');
        $outputDhaka = $table->where('shipping_method_id',$shipping_method_id)->where('label','in_dhaka')->get()->getRow();

        $table2 = DB()->table('cc_shipping_settings');
        $outputOutDhaka = $table2->where('shipping_method_id',$shipping_method_id)->where('label','out_dhaka')->get()->getRow();

        $this->inDhakaPrice = $outputDhaka->value;
        $this->outDhakaPrice = $outputOutDhaka->value;

        return $this;
    }

    public function calculateShipping($city){
        if ($city == 322){
            $shippingRate = $this->inDhakaPrice;
        }else{
            $shippingRate =  $this->outDhakaPrice;
        }
        return $shippingRate;
    }



}