<?php  
    #$ch = curl_init('https://www.yandex.com');
    #curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    #curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    #$b = curl_exec($ch);
    $ch = file_get_contents('https://www.yandex.com');
    #print_r($ch);
    
    function login_request($url, $postdata = null, $cookiefile = ""){
        $page = curl_init($url);
        curl_setopt($page, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($page, CURLOPT_HEADER, true);
        curl_setopt($page, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($page, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($page, CURLOPT_SSL_VERIFYHOST, false);
        
        
        
      
        
        $output = curl_exec($page);
        if($output === FALSE){
            echo "cURL error: " . $curl_error;
            die();
        }
    }
    
    $url = 'https://informatics.msk.ru/login/index.php';
    $cookiefile = "C:\xampp\htdocs\informaticsTaskParser\cookie.txt";
    //data for POST request
    $postdata = [
        'username' => "denisich2001",
        'password' => "deniska",
        'testcookies' => "1"
    ];
    
    
    
    
    $page = login_request($url, $postdata, $cookiefile);
    
    echo $page;
?>  
