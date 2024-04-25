<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    

    <form action="" method="post">
    <h1>MENGINPUT DATA SISWA</h1>
    <label for="nama">NAMA :</label>
    <input type="text" id="nama" name="nama"><br></br>
    <label for="nama">NIS :</label>
    <input type="number" id="nis" name="nis"><br></br>
    <label for="nama">RAYON :</label>
    <input type="text" id="rayon" name="rayon"><br></br>
    <button type="submit" name="kirim" value="kirim"><i class='bx bx-plus'></i>TAMBAH</button>
    <button type="submit" name="kirim" value="cetak"><i class='bx bxs-printer'></i><a href="session2.php">CETAK</a></button>
    <button type="submit" name="hapus" value="hapus"><i class='bx bxs-trash'></i><a href="session3.php">HAPUS DATA</a></button>

    <?php
session_start();

if(!isset($_SESSION['dataSiswa'])){
    $_SESSION['dataSiswa']= array ();
}

if(isset($_POST['nama']) && isset($_POST['nis']) && isset($_POST['rayon'])){
    $data = array(
        'nama' => $_POST['nama'],
        'nis' => $_POST['nis'],
        'rayon' => $_POST['rayon'],
    );
    array_push($_SESSION['dataSiswa'], $data);
};

if(isset($_GET['hapus'])){
    $index = $_GET['hapus'];
    unset($_SESSION['dataSiswa'][$index]);
    header('Location:http://erdieka.000webhostapp.com/session1.php');
    exit;
}
// var_dump($_SESSION['dataSiswa']);

echo '<table border="1">';
echo '<tr>';
echo '<th>NAMA</th>';
echo '<th>NIS</th>';
echo '<th>RAYON</th>';
echo '<th>AKSI</th>';
echo '</tr>';

foreach($_SESSION['dataSiswa']  as $index => $value){
    echo '<tr>';
    echo '<td>' . $value['nama'] . '</td>';
    echo '<td>' . $value['nis'] . '</td>';
    echo '<td>' . $value['rayon'] . '</td>';
    echo '<td>
    <a href="?hapus='.$index.'" class="btn btn-danger btn-sm">hapus</a></td>';
    echo '</tr>';
}

echo '</table>';

?>
    </form>




<!-- // $data = [
//     ['nama' => 'ranny', 'nis' => 20],
//     ['nama' => 'duma', 'nis' => 21],
//     ['nama' => 'bakti', 'nis' => 22],
// ];

// foreach($data as $key => $value ){
//     echo $key . ":" .$value['nama'] . "<br>";
//     echo $key . ":" .$value['nis'] . "<br>";
// }
?> -->
</body>
</html>