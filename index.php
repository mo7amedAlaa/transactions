<?php


$root = __DIR__ . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'App' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR); 


require APP_PATH .'app.php';

$files = getTransactiosFiles(FILES_PATH);

$transactios=[];

foreach($files as $file)
{
    $transactios = array_merge($transactios , getTransactios($file));
}
$total = CalculateTotal($transactios);
require VIEWS_PATH . 'trasnsactios.php';
?>