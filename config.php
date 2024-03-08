<?php
require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$factory = (new Factory())->withDatabaseUri('https://arogyasair-157e8-default-rtdb.asia-southeast1.firebasedatabase.app/');
$database = $factory->createDatabase();
?>