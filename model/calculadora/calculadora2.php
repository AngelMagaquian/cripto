<?php
require_once('../../vendor/autoload.php');
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

//$cripto = $_POST['data'];
$cripto = $_POST['data'];


$client = new CoinGeckoClient();
$data = $client->ping();
$data = $client->simple()->getPrice($cripto,'ars');



$jsonstring= json_encode($data);
echo $jsonstring;
?>