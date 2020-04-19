<?php  
    
    function login_request($url, $postdata = null, $cookiefile){
        $page = curl_init($url);
        curl_setopt($page, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($page, CURLOPT_HEADER, true);
        curl_setopt($page, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($page, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($page, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($page, CURLOPT_COOKIEFILE, $cookiefile);
        curl_setopt($page, CURLOPT_COOKIEJAR, $cookiefile);
        //curl_setopt($page, CURLOPT_COOKIESESSION, true);
        
        curl_setopt($page, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 YaBrowser/20.3.2.242 Yowser/2.5 Safari/537.36');
        if($postdata){
            curl_setopt($page, CURLOPT_POSTFIELDS, $postdata);
        }
        
        $output = curl_exec($page);
        if($output === FALSE){
            echo "cURL error: " . $curl_error;
            die();
        }
        return $output;
    }
    //$cookiefile = 'C:\xampp\htdocs\informaticsTaskParser\cookiefile.txt';
    $cookiefile = 'cookiefile.txt';
    file_put_contents($cookiefile,'');

    
    //--------------------------------------------------------------------------
    //Login procedure
    
    $login_url = 'https://informatics.msk.ru/login/index.php';
    
    //data for POST request
    $postdata = [
        'username' => 'denisich2001',
        'password' => 'deniska',
        'testcookies' => 1
    ];
    
    $login_page = login_request($login_url, $postdata, $cookiefile);
    
    //print($login_page);
    
    //--------------------------------------------------------------------------
    //Tasks processing
    function task_request($task_number, $page_number, $cookiefile){
        $task_page = curl_init('https://informatics.msk.ru/mod/statements/view3.php?chapterid='.$task_number.'&submit#'.$page_number);
        curl_setopt($task_page, CURLOPT_COOKIEJAR, $cookiefile);
        curl_setopt($task_page, CURLOPT_COOKIEFILE, $cookiefile);
        curl_setopt($task_page, CURLOPT_HEADER, true);
        curl_setopt($task_page, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($task_page, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($task_page, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($task_page, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($task_page);
        return $output;
    }
    
    
    $task_number = 1;    
    //
    $page_number = 2;
    $task_page = task_request($task_number,$page_number,$cookiefile);
    print($task_page);
    //check on errors
    
?>  
