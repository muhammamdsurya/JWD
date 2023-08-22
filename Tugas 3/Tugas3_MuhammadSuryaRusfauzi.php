<?php
echo "================ Cetak Bilangan Ganjil GENAP 1 - 100 =================== <br>";
for ($i = 1; $i<=100; $i++) { //lakukan perulangan sebanyak 100x
    if ($i % 2 == 0){ // jika angka pada saat perulangan, di mod 2 = 0
        echo $i. ' Adalah Bilangan genap.'. '<br>'; // output bilangan genap
    } else { // jika angka pada saat perulangan, di mod 2 != 0
        echo $i. ' Adalah Bilangan ganjil.'. '<br>'; // output bilangan ganjil
    }
}