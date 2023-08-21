<?php
// Masukan variabel untuk nilai yang akan di hitung
$bilangan1 = 9;
$bilangan2 = 3;

// fungsi penjumlahan
function penjumlahan($bilangan1, $bilangan2)
{
      $hasil = $bilangan1 + $bilangan2;
      return $hasil;
}

// fungsi pengurangan
function pengurangan($bilangan1, $bilangan2)
{
      $hasil = $bilangan1 - $bilangan2;
      return $hasil;
}

// fungsi perkalian
function perkalian($bilangan1, $bilangan2)
{
      $hasil = $bilangan1 * $bilangan2;
      return $hasil;
}

// fungsi pembagian
function pembagian($bilangan1, $bilangan2)
{
      $hasil = $bilangan1 / $bilangan2;
      return $hasil;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Kalkulator Sederhana</title>
</head>

<body>
      <h3>Kalkulator Sederhana</h3>
      <?= "Bilangan 1 : " . $bilangan1 ?> <br> <!-- panggil variable yang sudah di deklarasikan diatas-->
      <?= "Bilangan 2 : " . $bilangan2 ?> <!-- panggil variable yang sudah di deklarasikan diatas-->
      <hr>
      <hr>

      <p>Hasil penjumlahan adalah <?= penjumlahan($bilangan1, $bilangan2) ?></p> <!-- panggil fungsi yang sudah di deklarasikan diatas sesuai dengan operasinya-->
      <p>Hasil penjumlahan adalah <?= pengurangan($bilangan1, $bilangan2) ?></p> <!-- panggil fungsi yang sudah di deklarasikan diatas sesuai dengan operasinya-->
      <p>Hasil penjumlahan adalah <?= perkalian($bilangan1, $bilangan2) ?></p><!-- panggil fungsi yang sudah di deklarasikan diatas sesuai dengan operasinya-->
      <p>Hasil penjumlahan adalah <?= pembagian($bilangan1, $bilangan2) ?></p><!-- panggil fungsi yang sudah di deklarasikan diatas sesuai dengan operasinya-->
</body>

</html>