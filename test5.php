<?php

function karakter_modus($kata) {
    // Hitung kemunculan setiap karakter dalam kata
    $kemunculan_karakter = count_chars($kata, 1);

    // Temukan karakter yang muncul paling banyak
    $max_kemunculan = 0;
    $karakter_modus = '';
    foreach ($kemunculan_karakter as $karakter => $jumlah) {
        if ($jumlah > $max_kemunculan) {
            $max_kemunculan = $jumlah;
            $karakter_modus = chr($karakter);
        }
    }

    // Kembalikan karakter terbanyak dan jumlah kemunculannya
    return $karakter_modus . ' ' . $max_kemunculan . 'x';
}

// Contoh penggunaan fungsi
echo karakter_modus('wellcome') . "\n"; // Output: l 2x
echo karakter_modus('strawberry') . "\n"; // Output: r 2x
?>