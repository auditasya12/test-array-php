<?php 

function nilai_terbesar_kedua($array){
    arsort($array);

    $nilai_terbesar_dua = null;
    $counter = 0;
    foreach($array as $nilai){
        $counter++;
        if($counter === 2){
            $nilai_terbesar_dua = $nilai;
            break;
        }
    }
    return $nilai_terbesar_dua;
}
$array_angka = [1, 2, 25, 30, 25, 90];
$nilai_terbesar_dua = nilai_terbesar_kedua($array_angka);
echo "Nilai terbesar kedua: ".$nilai_terbesar_dua."\n";
?>