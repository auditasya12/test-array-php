<?php

$warna_nol = 0;

function rambu(){
    global $warna_nol;
    $warna=['merah', 'kuning', 'hijau'];
    $status=$warna[$warna_nol];
    $warna_nol = ($warna_nol+1)%count($warna);
    return $status;
}

echo rambu(). "\n";
echo rambu(). "\n";
echo rambu(). "\n";
echo rambu(). "\n";
echo rambu(). "\n";