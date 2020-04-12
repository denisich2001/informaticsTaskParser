<?php  
    #$ch = curl_init('https://www.yandex.com');
    #curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    #curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    #$b = curl_exec($ch);
    $ch = file_get_contents('https://www.yandex.com');
    #print_r($ch);
    echo $ch;
?>  
