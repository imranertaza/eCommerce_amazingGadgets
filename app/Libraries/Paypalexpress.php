<?php

namespace App\Libraries;

class Paypalexpress
{

    public $pex_settings;
    public $session;

    public function __construct($pex_settings)
    {
        $this->pex_settings = $pex_settings;
        $this->session = \Config\Services::session();
    }

    /**
     * hash_call: Function to perform the API call to PayPal using API signature
     * @method_name is name of API  method.
     * @nvpStr is nvp string.
     * returns an associtive array containing the response from the server.
     */


    public function hash_call($method_name, $nvpstr)
    {
        $settings = $this->pex_settings;
        $nvpheader = "&PWD=" . urlencode($settings['api_password']) . "&USER=" . urlencode($settings['api_username']) . "&SIGNATURE=" . urlencode($settings['api_signature']);
        //setting the curl parameters.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $settings['api_endpoint']);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        //turning off the server and peer verification(TrustManager Concept).
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $nvpstr = $nvpheader . $nvpstr;
        //check if version is included in $nvpstr else include the version.
        if (strlen(str_replace('VERSION=', '', strtoupper($nvpstr))) == strlen($nvpstr)) {
            $nvpstr = "&VERSION=" . urlencode($settings['api_version']) . $nvpstr;
        }
        $nvpreq = "METHOD=" . urlencode($method_name) . $nvpstr;
        //setting the nvpreq as POST FIELD to curl
        curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
        //getting response from server
        $response = curl_exec($ch);
        //convrting NVPResponse to an Associative Array
        $nvpresarray = $this->deformat_nvp($response);
        $nvpreqarray = $this->deformat_nvp($nvpreq);
        $_SESSION['nvpreqarray'] = $nvpreqarray;

        if (curl_errno($ch)) {
            // moving to display page to display curl errors
            $_SESSION['curl_error_no'] = curl_errno($ch);
            $_SESSION['curl_error_msg'] = curl_error($ch);
            $location = "APIError.php";
            header("Location: $location");
        } else {
            //closing the curl
            curl_close($ch);
        }
        return $nvpresarray;
    }

    /** This function will take nvpstring and convert it to an Associative Array and it will decode the response.
     * It is usefull to search for a particular key and displaying arrays.
     */

    function deformat_nvp($nvpstr)
    {
        $intial = 0;
        $nvparray = array();
        while (strlen($nvpstr)) {
            //postion of Key
            $keypos = strpos($nvpstr, '=');
            //position of value
            $valuepos = strpos($nvpstr, '&') ? strpos($nvpstr, '&') : strlen($nvpstr);
            /*getting the Key and Value values and storing in a Associative Array*/
            $keyval = substr($nvpstr, $intial, $keypos);
            $valval = substr($nvpstr, $keypos + 1, $valuepos - $keypos - 1);
            //decoding the respose
            $nvparray[urldecode($keyval)] = urldecode($valval);
            $nvpstr = substr($nvpstr, $valuepos + 1, strlen($nvpstr));
        }
        return $nvparray;
    }

    /** 
     * This function will take token and processing actual payment with token.
     */
    public function make_payment($token)
    {
        // Getting settings.
        $settings = $this->pex_settings;
        $nvpstr = "&TOKEN=" . $token;
        // call api with token and getting result.
        $resarray = $this->hash_call("GetExpressCheckoutDetails", $nvpstr);
        $ack = strtoupper($resarray["ACK"]);
        if ($ack == 'SUCCESS' || $ack == 'SUCCESSWITHWARNING') {
            ini_set('session.bug_compat_42', 0);
            ini_set('session.bug_compat_warn', 0);
            $token = trim($resarray['TOKEN']);
            $payment_amount = trim($resarray['AMT']);
            $payerid = trim($resarray['PAYERID']);
            $server_name = trim($_SERVER['SERVER_NAME']);
            $nvpstr = '&TOKEN=' . $token . '&PAYERID=' . $payerid . '&PAYMENTACTION=' . $settings['payment_type'] . '&AMT=' . $payment_amount . '&CURRENCYCODE=' . $settings['currency'] . '&IPADDRESS=' . $server_name;
            $resarray = $this->hash_call("DoExpressCheckoutPayment", $nvpstr);
            $ack = strtoupper($resarray["ACK"]);
            // checking response for success.
            if ($ack != 'SUCCESS' && $ack != 'SUCCESSWITHWARNING') {
                return $resarray;
            } else {
                return $resarray;
            }
        } else {
            return $resarray;
        }
    }

    /** 
     * This function will take NVP string and setting up express checkout call and sending user to paypal url.
     */
    public function process_payment($nvpstr)
    {

        // Getting settings.
        $settings = $this->pex_settings;
        // call api with nvp string andset checkout request.
        $resarray = $this->hash_call("SetExpressCheckout", $nvpstr);

        return $resarray;
    }
}