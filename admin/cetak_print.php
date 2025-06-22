<!DOCTYPE html>
<html>
<head>
    <title>Laundryin</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="icon" type="image/png" href="../fiklaundry2.png">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</head>
<body>
    <?php
    session_start();
    if($_SESSION['status']!="login"){
        header("location:../index.php?pesan=belum_login");
    }
    ?>


    <?php
    include '../koneksi.php';
    ?>
    <div class="container">


        <center><h2>Laundryin</h2></center>
        <br/>
        <br/>
        <?php
        if(isset($_GET['dari']) && isset($_GET['sampai'])){


            $dari = $_GET['dari'];
            $sampai = $_GET['sampai'];
            ?>
            <h4>Data Laporan Laundry dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Berat (Kg)</th>
                    <th>Tgl. Selesai</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>


                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM pelanggan, transaksi 
                WHERE transaksi_pelanggan = pelanggan_id 
                AND DATE(transaksi_tgl) >= '$dari' 
                AND DATE(transaksi_tgl) <= '$sampai' 
                AND transaksi_status = '2' 
                ORDER BY transaksi_id DESC");

                $no = 1;
                while($d=mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
                        <td><?php echo $d['transaksi_tgl']; ?></td>
                        <td><?php echo $d['pelanggan_nama']; ?></td>
                        <td><?php echo $d['transaksi_berat']; ?></td>
                        <td><?php echo $d['transaksi_tgl_selesai']; ?></td>
                        <td><?php echo "Rp. ".number_format($d['transaksi_harga']) ." ,-"; ?></td>
                        <td>
                            <?php
                            if($d['transaksi_status']=="0"){
                                echo "<div class='label label-warning'>PROSES</div>";
                            }else if($d['transaksi_status']=="1"){
                                echo "<div class='label label-info'>DICUCI</div>";
                            }else if($d['transaksi_status']=="2"){
                                echo "<div class='label label-success'>SELESAI</div>";
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php } ?>
        </div>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
    </html>