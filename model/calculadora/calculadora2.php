<?php
require_once('../../vendor/autoload.php');
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

//$cripto = 'bitcoin';
$cripto = $_POST['data'];


$client = new CoinGeckoClient();
$data = $client->ping();
$data = $client->simple()->getPrice($cripto,'usd');

$cripto_name = current(array_keys($data));
$usd=array();
$usd=array('value'=>$data[$cripto_name]['usd']);

$jsonstring= json_encode($usd);
echo $jsonstring;
?>