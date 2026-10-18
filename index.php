<?php
// Membuat array berisi angka 1 sampai 20
$angka = range(1, 20);

echo "Angka yang habis dibagi 3 antara 1-20 adalah:<br>";

// Menggunakan perulangan (foreach) untuk menelusuri setiap angka dalam array
foreach ($angka as $i) {
    // Menggunakan percabangan (if) untuk menyaring angka yang habis dibagi 3
    if ($i % 3 == 0) {
        echo $i . "<br>";
    }
}
?>