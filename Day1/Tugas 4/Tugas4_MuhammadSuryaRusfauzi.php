<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 4</title>
</head>
<body>
    <form action="" method="post">
        <label for="masukan">Jumlah Bintang : </label>
        <input type="number" name="masukan"> <br>
        <button type="submit">Kirim</button> <br> <br>
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){ // memastikan bahwa kode PHP hanya dijalankan setelah form dikirimkan.
        $masukan = $_POST['masukan']; //mengambil inputan dari form menggunakan method POST

        for($i = 1; $i<= $masukan; $i++ ){ //lakukan perulangan sebanyak jumlah inputan
            for($j=1; $j<=$i; $j++){ //membuat bintang kesamping sesuai perulangannya
                echo '*';
            }
            echo '<br>'; // cetak baris baru setelah perulangan selesai
        }
    }
    ?>

</body>
</html>