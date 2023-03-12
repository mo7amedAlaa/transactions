<?php

function getTransactiosFiles(string $dirpath)
{

    $files =[];

    foreach(scandir($dirpath) as $file)
    {
       if(is_dir($file))
       continue;

      $files[]= $dirpath.$file;
    
    }

return  $files;
    
}

function getTransactios(string $filePath)
{
    if(!file_exists($filePath))
    {
       echo "file not exists"; 
    }
    else
    {
          $file = fopen($filePath , 'r');

          $transactions=[];

          while(($transaction = fgetcsv($file))!==false)
          {
            if($transaction !==null)
            {
                $transactions[]= $transaction;
            }
                   
            
          }
        return $transactions;

        
    }
}


function CalculateTotal($transactions)
{

// income 
// expense 
// Net 



$total = ['Income'=>0 , 'Expense'=>0 , 'Net'=>0];

foreach($transactions as $transaction)
{

    $amount = str_replace(['$',','],'', $transaction[3]);

    if($amount>0)
    {
            $total['Income']+=$amount;
    }
    else
    {
            $total['Expense']+=$amount;
    }
  $total['Net']+=$amount;
    
}



return $total;
    
}


?>