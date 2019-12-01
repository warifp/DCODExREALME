<?php
/**
 * Author  : Wahyu Arif Purnomo
 * Name    : DCODE X REALME 5 PRO & GOPAY
 * Version : 1.0
 * Update  : 01 Desember 2019
 * 
 * If you are a reliable programmer or the best developer, please don't change anything.
 * If you want to be appreciated by others, then don't change anything in this script.
 * Please respect me for making this tool from the beginning.
 */

include 'module/generatordouble.php';
include 'config/config.php';
require __DIR__ . '/vendor/autoload.php';
use \Curl\Curl;
$curl = new Curl();

$r = new randomNameGenerator('array');
$names = $r->generateNames(10);

$banner = "
## Giveaway DCODE Berhadiah Realme 5 Pro Dan Saldo GoPay Jutaan Rupiah! ##
- WAHYU ARIF P [1 DESEMBER 2019]\n\n";
print $banner;

function getRegister($curl, $referralCode, $publicToken, $data) {
    $curl->setHeader('Host', 'app.viral-loops.com');
    $curl->setHeader('Connection', 'keep-alive');
    $curl->setHeader('Content-Length', '' .strlen($data));
    $curl->setHeader('Origin', 'https://infohadiah.co');
    $curl->setHeader('X-UCID', $publicToken);
    $curl->setHeader('User-Agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36');
    $curl->setHeader('Content-Type', 'application/json');
    $curl->setHeader('Accept', '*/*');
    $curl->setHeader('Sec-Fetch-Site', 'cross-site');
    $curl->setHeader('Sec-Fetch-Mode', 'cors');
    $curl->setHeader('Referer', 'https://infohadiah.co/giveaway-realme-5-pro-dcode/?referralCode=' . $referralCode . '&refSource=copy');
    $curl->setHeader('Accept-Encoding', 'gzip, deflate, br');
    $curl->post('https://app.viral-loops.com/api/v2/events', $data);
    
    if ($curl->error) {
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    } else {
        //return var_dump($curl->response);
        return $curl->response->isNew;
        
    }
}
$no = 0;
for ($x = 0; $x < 1000; $x++) {
    $no++;

    $dataRegister = array(
        'params' => array(
            'event' => 'registration',
            'user' => array(
                'firstname' => $names[$no],
                'lastname' => '081' . rand(111111111,999999999),
                'email' => '' . str_replace(' ', '_', $names[$no]) . '@gmail.com'
            ),
            'referrer' => array(
                'referralCode' => $referralCode
            ),
            'refSource' => 'copy',
            'acquiredFrom' => 'form_widget'
        ),
        'publicToken' => $publicToken
    );
    $data = json_encode($dataRegister);
    
    $register = getRegister($curl, $referralCode, $publicToken, $data);
    
    if ($register == 1) {
        echo $no . ". [\e[0;32mSuccess\e[0m] [" . $data . "]\n\n";
        sleep(10);
    } else {
        echo $no . ". [\e[0;31mFailed\e[0m] [Please change referral or publicToken in configuration file 'config/config.php']\n\n";
        exit;
    }
}

/**
 * Author  : Wahyu Arif Purnomo
 * Name    : DCODE X REALME 5 PRO & GOPAY
 * Version : 1.0
 * Update  : 01 Desember 2019
 * 
 * If you are a reliable programmer or the best developer, please don't change anything.
 * If you want to be appreciated by others, then don't change anything in this script.
 * Please respect me for making this tool from the beginning.
 */