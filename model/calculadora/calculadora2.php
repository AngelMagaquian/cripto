<?php
require_once('../../vendor/autoload.php');
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

//$cripto = 'bitcoin';
$cripto = $_POST['data'];


$client = new CoinGeckoClient();
$data = $client->ping();
$data = $client->simple()->getPrice($cripto,'ars');

$cripto_name = current(array_keys($data));
$ars=array();
$ars=array('value'=>$data[$cripto_name]['ars']);

$jsonstring= json_encode($ars);
echo $jsonstring;
?>