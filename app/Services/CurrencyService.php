<?php


namespace App\Services;


class CurrencyService
{
    public static function api_call_price($from, $to): ?string
    {
        $from = (trim(strtoupper($from)));
        $to = (trim(strtoupper($to)));

        $url = 'curl -s -H "CB-VERSION: 2017-12-06" "https://api.coinbase.com/v2/prices/'.$from.'-'.$to.'/spot"';
        $tmp = shell_exec($url);
        $data = json_decode($tmp, true);
        if ($data && $data['data'] && $data['data']['amount']) {
            return $from . " $" . (float)$data['data']['amount'] . "   ";
        }
        return null;
    }

    public static function _isCurl(): bool
    {
        return function_exists('curl_version');
    }

    public static function privat24_exchange_rates() {
        $courses = "";

        if (self::_isCurl()){
            $url = "https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);
            if(!$output) return false;
            $courses = json_decode($output,true);
        } else{
            echo "CURL is disabled";
        }
        $currencies_array = ['USD','EUR','BTC'];
        $res = '';

        foreach($courses as $course){
            if(in_array($course['ccy'], $currencies_array)){
                $res .= $course['ccy'] . " ₴" . number_format( $course['buy'], 2 ) . "   ";
            }
        }

        return $res;
    }

    public static function output_currencies()
    {
        $currency_data = [
//            self::api_call_price("BTC", "USD"),
//            self::api_call_price("LTC", "USD"),
//            self::api_call_price("ZEC", "USD"),
//            self::api_call_price("DOT", "USD"),
//            self::api_call_price("DOGE", "USD"),
//            self::api_call_price("DASH", "USD"),
//            self::api_call_price("XLM", "USD"),
//            self::api_call_price("ADA", "USD"),
//            self::api_call_price("ETH", "USD"),
//            self::api_call_price("BCH", "USD"),
//            self::api_call_price("EOS", "USD"),

            self::privat24_exchange_rates(),
        ];

        foreach ($currency_data as $cd)
            echo $cd;
    }

}
