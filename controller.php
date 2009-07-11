<?php 
include('accounts.php');
$results = array();
$keys = array_keys($accounts);
if(isset($_POST['account'])){
  $sentaccounts = $_POST['account'];
  foreach($sentaccounts as $a){
    if(isset($_POST['retweet'])){
      $rand = $a;
      while($rand == $a){
        $rand = $sentaccounts[rand(0,sizeof($sentaccounts)-1)];
      }  
    }
    $x = '';
    $username = $a;
    $password = $accounts[$a];
    $ch = curl_init(); 
    $posturl = 'https://query.yahooapis.com/v1/public/yql';
    $postvars = 'q=use%20\'http%3A%2F%2Fwww.yqlblog.net%2Fsamples%2F'.
                'twitter.status.xml\'%3B%20insert%20into%20twitter.'.
                'status%20(status%2Cusername%2Cpassword)%20values%20(%22';
    if(isset($_POST['retweet'])){
      $postvars .= urlencode(str_replace('%account%',$rand,$retweetmask));
    }
    $postvars.= urlencode($_POST['tweet']);
    $postvars .= '%22%2C%20%22'.$username.'%22%2C%22'.$password.
                 '%22)&format=xml';
    $ch = curl_init($posturl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $x = curl_exec($ch);
    $s = simplexml_load_string($x);
    if($s->results->status){
      $results[$a] = true;
    } else {
      $results[$a] = false;
    }
  }
}
?>
  
