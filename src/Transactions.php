<?php

namespace TooPago\CoinPayments;

use InvalidArgumentException;
use Exception;

class Transactions
{


    public function newTransaction($amount, $currency, $buyer_email, $onSuccess, $onError)
    {
        try {
            $cps_api = new CoinpaymentsAPI(env('COINPAYMENTS_PRIVATE_KEY', ''), env('COINPAYMENTS_PUBLIC_KEY', ''), 'json');
            if($cps_api != null){
                $transaction_response = $cps_api->CreateSimpleTransaction($amount, $currency, $buyer_email);
                if ($transaction_response['error'] == 'ok') {
                    $onSuccess($transaction_response , $this); 
                } else {
                    $OpenPay = new \stdClass;
                    $OpenPay->message = $transaction_response['error'];
                    $onError($OpenPay);
                }
            } else {
                $OpenPay = new \stdClass;
                $OpenPay->message = 'Operation not allowed';
                $onError($OpenPay);
            }
        } catch (\InvalidArgumentException $exc) {
            $onError($exc);
        } catch (Exception $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        }
    }

    public function newTransactionCompex($d, $onSuccess, $onError)
    {
        try {
            $cps_api = new CoinpaymentsAPI(env('COINPAYMENTS_PRIVATE_KEY', ''), env('COINPAYMENTS_PUBLIC_KEY', ''), 'json');
            if($cps_api != null){
                $transaction_response = $cps_api->CreateComplexTransaction($d["amount"], $d["currency1"], $d["currency2"], $d["buyer_email"], $d["address"], $d["buyer_name"], $d["item_name"], $d["item_number"], $d["invoice"], $d["custom"], $d["ipn_url"]);
                if ($transaction_response['error'] == 'ok') {
                    $onSuccess($transaction_response , $this); 
                } else {
                    $OpenPay = new \stdClass;
                    $OpenPay->message = $transaction_response['error'];
                    $onError($OpenPay);
                }
            } else {
                $OpenPay = new \stdClass;
                $OpenPay->message = 'Operation not allowed';
                $onError($OpenPay);
            }
        } catch (\InvalidArgumentException $exc) {
            $onError($exc);
        } catch (Exception $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        }
    }



    public function getTxID($id, $onSuccess, $onError)
    {
        try {
            $cps_api = new CoinpaymentsAPI(env('COINPAYMENTS_PRIVATE_KEY', ''), env('COINPAYMENTS_PUBLIC_KEY', ''), 'json');
            if($cps_api != null){
                $transaction_response = $cps_api->GetTxInfoSingle($id);
                dd($transaction_response);
                if ($transaction_response['error'] == 'ok') {
                    $onSuccess($transaction_response , $this); 
                } else {
                    $OpenPay = new \stdClass;
                    $OpenPay->message = $transaction_response['error'];
                    $onError($OpenPay);
                }
            } else {
                $OpenPay = new \stdClass;
                $OpenPay->message = 'Operation not allowed';
                $onError($OpenPay);
            }
        } catch (\InvalidArgumentException $exc) {
            $onError($exc);
        } catch (Exception $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        }
    }

    //$limit = 25, $start = 0, $newer = 0
    public function getTxIDS($limit, $start, $newer, $onSuccess, $onError)
    {
        try {
            $cps_api = new CoinpaymentsAPI(env('COINPAYMENTS_PRIVATE_KEY', ''), env('COINPAYMENTS_PUBLIC_KEY', ''), 'json');
            if($cps_api != null){
                $transaction_response = $cps_api->GetSellerTransactionList($limit, $start, $newer);
                dd($transaction_response);
                if ($transaction_response['error'] == 'ok') {
                    $onSuccess($transaction_response , $this); 
                } else {
                    $OpenPay = new \stdClass;
                    $OpenPay->message = $transaction_response['error'];
                    $onError($OpenPay);
                }
            } else {
                $OpenPay = new \stdClass;
                $OpenPay->message = 'Operation not allowed';
                $onError($OpenPay);
            }
        } catch (\InvalidArgumentException $exc) {
            $onError($exc);
        } catch (Exception $exc) {
            $OpenPay = new \stdClass;
            $OpenPay->message = $exc->getMessage();
            $onError($OpenPay);
        }
    }


}