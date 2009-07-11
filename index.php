<?php include('controller.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
  <title>MultiTweet - send Twitter updates from several accounts</title>
  <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" type="text/css">
  <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/base/base.css" type="text/css">
  <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
<div id="doc" class="yui-t7">
  <div id="hd" role="banner"><h1>Multi<span>Tweet</span></h1></div>
  <div id="bd" role="main">
    <p id="intro">MultiTweet is a simple interface to send Twitter updates from several accounts at the same time. Simply check the accounts you want to send the message from, enter your update and hit "send twitter update".</p>
    <form action="index.php" method="post" accept-charset="utf-8">
      <div class="yui-gd">
        <div class="yui-u first">
          <h2>Accounts <span>check the ones you want to use</span></h2>
          <ul id="accounts">
            <?php
              $count = 0;
              foreach(array_keys($accounts) as $a){
                echo '<li><input type="checkbox" value="'.$a.
                     '" name="account[]" id="acc'.$count.
                     '"><label for="acc'.$count.'">'.$a;
                if(isset($_POST['account'])){
                if(isset($results[$a])){
                  echo ' <span>sent</span> ';
                  if($results[$a]===true){
                    echo '<span class="success">success</span> ';
                  } else {
                    echo '<span class="error">failure</span> ';
                  } 
                }  else {
                    echo ' <span class="skipped">not requested</span> ';
                  }

                }
                echo '</label></li>';
                $count++;
              }
            ?>
          </ul>
          <div class="inline"><input type="checkbox" name="retweet" id="retweet"><label for="retweet">Add random account retweet</label></div>
        </div>
        <div class="yui-u">
          <div><h2>Your twitter message</h2>
          <?php if(isset($_POST['account'])){?>
          <p>Your update has been sent. Check the status messages next to the accounts.</p>
          <?php }?>
          <label for="tweet">Twitter update</label><textarea name="tweet" id="tweet"></textarea></div>
          <div class="submit"><input type="submit" value="send twitter update"></div>
       </div>
      </div>  
    </form>
  </div>
  <div id="ft" role="contentinfo"><p>MultiTweet written by <a href="http://icant.co.uk">Christian Heilmann</a> using <a href="http://developer.yahoo.com/yui">YUI</a> and <a href="http://developer.yahoo.com/yql">YQL</a></p></div>
</div>
</body>
</html>


