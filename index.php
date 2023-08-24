<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "bismillah";


    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

    //jika tombol simpan di klik
    if(isset($_POST['bsimpan']))
    {
        $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi)
                                          VALUES  ('$_POST[tnim]', 
                                                   '$_POST[tnama]',
                                                   '$_POST[talamat]',
                                                   '$_POST[tprodi]')
                                        ");

    if($simpan) //jika simpan suksess
    {
        echo "<script>
                alert('simpan data sukses!');
                document.location='index.php';
              </script>";
     }
     else
     {
         echo "<script>
                alert('simpan data gagal!!');
                document.location='index.php';
              </script>";
     }
 }

?>



<!doctype html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
</body>
<div class="container">
    <h1 class="text-center">SERTIKOM CRUD</h1>

    <!-- awal card -->
    <div class="card">
    <div class="card-header bg-primary text-white">
        Form Input Data Mahasiswa
    </div>
    <div class="card-body">
       <form method="post" action="">
        <div class="form-group">
            <label>NIM</label>
            <Input type="text" name="tnim" class="form-control" placeholder="input nim anda disini" required>
        </div>
        <div class="form-group">
            <label>NAMA</label>
            <Input type="text" name="tnama" class="form-control" placeholder="input nama anda disini" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="talamat"  placeholder="input alamat anda disini"></textarea>
        </div>
        <div class="form-group">
            <label>prodi</label>
            <select class="form-control" name="tprodi">
                <option></option>
                <option value="D3-TRPL">D3-TRPL</option>
                <option value="S1-TRPL">S1-TRPL</option>
        </select>
        </div>

        <button type="submit" class="btn btn-success" name="bsimpan">simpan</button>
        <button type="submit" class="btn btn-success" name="breset">kosongkan</button>

       </form>
    </div>
    </div>
    <!-- akhir card -->


    <!-- awal card tabel-->
    <div class="card">
    <div class="card-header bg-primary text-white">
        daftar mahasiswa
    </div>
    <div class="card-body">
      
    <table class="table table-bordered table-striped">
        <tr>
            <th>no</th>
            <th>nim</th>
            <th>nama</th>
            <th>alamat</th>
            <th>prodi</th>
            <th>Aksi</th>
        </tr>

        <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs desc");
            while($data = mysqli_fetch_array($tampil)) :
        ?>

        <tr>
            <td><?=$no++;?></td>
            <td><?=$data['nim']?></td> 
            <td><?=$data['nama']?></td>
            <td><?=$data['alamat']?></td>
            <td><?=$data['prodi']?></td>
            <td>
                <a href="#" class="btn btn-warning"> edit </a>
                <a href="#" class="btn btn-danger"> hapus </a>
            </td>
        </tr>
        <?php endwhile; //penutuP peruangan while ?>

    </table>
    </div>
    </div>
    <!-- akhir card -->
   
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
