<?php

use Illuminate\Support\Arr;




function computeRepaymentCoefficient($transactionReference) {

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => env('ML_BASE_URL')."/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        // CURLOPT_HTTPHEADER => array(
        //     "Authorization: Bearer ".env('PAYSTACK_SECRET_KEY'),
        //     "Cache-Control: no-cache",
        // ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        return $err;
    } else {
        return json_decode($response);
    }
}
