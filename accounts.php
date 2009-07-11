<?php
/*
  MultiTweet by Christian Heilmann (accounts file)
  Version: 1.0
  Homepage: http://icant.co.uk/multitweet/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
/*
  These are the accounts to use for your twitter updates

*/
$accounts = array(
  // user         // password
  'account' => 'password',
  'account2' => 'password2',
  'account3' => 'password3',
);

// template for the retweet string, %account% will be replaced
// by the real account name.
$retweetmask = 'RT @%account%: ';
?>