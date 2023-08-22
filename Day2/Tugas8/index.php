<?php

$bandaraAsal = [
      'Soekarno-Hatta (CGK)' => 50000,
      'Husein Sastranegara (BDO)' => 30000,
      'Abdul Rachman Saleh (MLG)' => 25000,
      'Juanda (SUB)' => 40000
];
$bandaraTujuan = [
      'Ngurah Rai (DPS)' => 60000,
      'Hasanudin (UPG)' => 45000,
      'Inanwatan (INX)' => 20000,
      'Sultan Iskandarmuda (BTJ)' => 35000
];

// Fungsi untuk menghitung pajak
function hitungPajak($asal, $tujuan) //menerima parameter dari inputan
{
      global $bandaraAsal;
      global $bandaraTujuan;
      $pajakAsal = $bandaraAsal[$asal]; //ambil nilai pajak berdasarkan $asal (inputan)
      $pajakTujuan = $bandaraTujuan[$tujuan]; //ambil nilai pajak berdasarkan $tujuan (inputan)

      return $pajakAsal + $pajakTujuan; //kembalikan total pajakAsal ditambah pajakTujuan
}

// Fungsi untuk menghitung total
function hitungTotal($harga, $pajak) //menerima parameter dari inputan
{
      return $harga + $pajak;
}

$file = 'data/data.json';
$jsonData = file_get_contents($file); // Mendapatkan file json
$data = json_decode($jsonData, true); // Mendecode data.json


if (isset($_POST['submit'])) { //jika tombol submit ditekan
      //tangkap inputan user
      $maskapai = $_POST['maskapai'];
      $inputAsal = $_POST['bandaraAsal'];
      $inputTujuan = $_POST['bandaraTujuan'];
      $harga = $_POST['harga'];

      $pajak = hitungPajak($inputAsal, $inputTujuan);
      $total = hitungTotal($harga, $pajak);

      //siapkan data untuk di insert kedalam JSON
      $newData = [
            "maskapai" => $maskapai,
            "bandara_asal" => $inputAsal,
            "bandara_tujuan" => $inputTujuan,
            "harga" => $harga,
            "pajak" => $pajak,
            "total" => $total
      ];

      // Tambahkan data baru ke dalam array yang sudah ada
      $data[] = $newData;

      // Buat array yang berisi nilai maskapai dari setiap data
      $maskapaiArray = array_column($data, 'maskapai');

      // Lakukan pengurutan pada data berdasarkan array maskapai
      array_multisort($maskapaiArray, SORT_ASC, $data);

      // Konversi array ke format JSON
      $jsonData = json_encode($data, JSON_PRETTY_PRINT);

      // Tulis data JSON kembali ke file
      file_put_contents($file, $jsonData);
}

?>

<!doctype html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Tugas 8</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

</head>

<body style="background-image: url('img/bg.jpg')">
      <div class="container col-9 mt-4">
            <!-- Form -->
            <form action="" method="POST">
                  <fieldset>
                        <legend class="text-center fw-bold">Pendaftaran Rute Penerbangan</legend>
                        <div class="mb-2">
                              <label for="disabledTextInput" class="form-label">Maskapai</label>
                              <input type="text" id="disabledTextInput" class="form-control" name="maskapai" placeholder="Masukan nama maskapai" required>
                        </div>
                        <div class="mb-2">
                              <label for="disabledSelect" class="form-label">Bandara Asal</label>
                              <select name="bandaraAsal" class="form-select">
                                    <?php foreach ($bandaraAsal as $asal => $pajak) : ?> <!-- Lakukan perulangan berdasarkan $bandaraAsal -->
                                          <option value="<?= $asal; ?>"><?= $asal; ?></option>
                                    <?php endforeach; ?>
                              </select>

                        </div>
                        <div class=" mb-2">
                              <label for="disabledSelect" class="form-label">Bandara Tujuan</label>
                              <select name="bandaraTujuan" class="form-select">
                                    <?php foreach ($bandaraTujuan as $tujuan => $pajak) : ?> <!-- Lakukan perulangan berdasarkan $bandaraTujuan -->
                                          <option value="<?= $tujuan; ?>"><?= $tujuan; ?></option>
                                    <?php endforeach; ?>
                              </select>
                        </div>
                        <div class="mb-3">
                              <label for="disabledTextInput" class="form-label">Harga Tiket</label>
                              <input type="number" id="disabledTextInput" class="form-control" name="harga" placeholder="Masukan Harga Tiket" required>
                        </div>
                        <button type="submit" class="btn btn-primary px-5" name="submit">Submit</button>
                  </fieldset>
            </form>
      </div>

      <!-- Tabel -->
      <legend class="text-center fw-bold mt-2">Daftar Rute Penerbangan</legend>
      <div class="container col-9 bg-white py-3 mb-5">
            <table class="table table-striped table-hover" id="myTable">
                  <thead>
                        <tr>
                              <th>No</th>
                              <th>Maskapai</th>
                              <th>Asal Penerbangan</th>
                              <th>Tujuan Penerbangan</th>
                              <th>Harga Tiket</th>
                              <th>Pajak</th>
                              <th>Total Harga Tiket</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php foreach ($data as $index => $row) : ?> <!--  lakukan perulangan sebanyak $data-->
                              <tr>
                                    <th scope="row"><?php echo $index + 1; ?></th>
                                    <!--  Ambil data json sesuai key -->
                                    <td><?php echo $row['maskapai']; ?></td>
                                    <td><?php echo $row['bandara_asal']; ?></td>
                                    <td><?php echo $row['bandara_tujuan']; ?></td>
                                    <td><?php echo $row['harga']; ?></td>
                                    <td><?php echo $row['pajak']; ?></td>
                                    <td><?php echo $row['total']; ?></td>
                              </tr>
                        <?php endforeach; ?>
                  </tbody>
            </table>
      </div>

      <!-- Import jQuery and DataTables -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

      <!-- Apply DataTables to the table -->
      <script>
            $(document).ready(function() {
                  $('#myTable').DataTable({
                        lengthMenu: [5, 10, 25, 50],
                        pageLength: 5 // Set the number of entries per page to 5
                  });
            });
      </script>

      <!-- Bootstrap CDN -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>