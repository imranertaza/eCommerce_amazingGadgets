<?php namespace App\Libraries;

class Weight_shipping{

    private $inDhakaPrice;
    private $outDhakaPrice;

    public function getSettings(){
        $cart = new Mycart();
        $shipping_method_id = get_data_by_id('shipping_method_id','cc_shipping_method','code','weight');

        $table = DB()->table('cc_weight_shipping_settings');
        $shippingData = $table->where('shipping_method_id',$shipping_method_id)->orderBy('label','ASC')->get()->getResult();
        $weight = 0;
        $value = 0;
        foreach ($cart->contents() as $val){
            $weight += get_data_by_id('weight','cc_products','product_id',$val['id']);
        }

        foreach ($shippingData as $ship){
            if($ship->label <  $weight ) {
                $value = $ship->value;
            }else{
                if ($ship->label == 0){
                    $value = $ship->value;
                }
            }
        }
        return $value;
    }



}