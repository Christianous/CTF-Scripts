#!/usr/bin/env php
<?php

$start = intval($argv[1]);
$end = intval($argv[2]);
if(sizeof($argv)!=3) {
        die("SUCKER!!!");
}

$cookie = "yWzBRHaY7KP7QA8ReauAeIxYf5E0Uy1X7pPAm07mZoiAdqzpAh";

$fp = fopen('data'.$start.'.txt', 'w');

$i = $start;
while ($i < $end) {
    //$seed=strval($i);
        $seed=$i;
    mt_srand($seed);
    $cook = generateSession();
    if ( $cook === $cookie) {
        $message = "seed: " . $seed ."\n";
        $message .= "token: " . genToken() . "\n";
                fwrite($fp, $message);
                break;
    }
    if ($seed % 10000 == 0) {
        $pourcent = ($seed-$start)*100/($end-$start);
        $message = "Avancement: $pourcent%\n";
                fwrite($fp, $message);
    }
    $i += 1;
}

fclose($fp);

function genToken() {
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $token = "";
        for($i = 0; $i < 32; $i++) {
                $token .= $chars[mt_rand(0,strlen($chars)-1)];
        }
        return $token;
}

function generateSession() {
  $chars = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $session = "";
  for($i = 0; $i < 50; $i++) {
    $session .= $chars[mt_rand(0,strlen($chars)-1)];
  }
  return $session;
}

?>
