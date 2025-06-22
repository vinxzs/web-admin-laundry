<!DOCTYPE html>
<html>
<head>
    <title>LAUNDRYIN</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="icon" type="image/png" href="fiklaundry2.png">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <style>
        body {
            background-image: url('assets/suasana.jpeg'); /* Sesuaikan path jika file berada di folder 'assets' */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center 20%;
        }
            h1 {
            display: none; /* Menyembunyikan teks */
        }

        .logo {
            display: inline-block;
            max-width: 500px; /* Tentukan ukuran maksimal logo */
            height: auto;
            margin-top: -50px;
            margin-bottom: -200px; /* Tambahkan margin bawah agar logo lebih dekat dengan form */
        }
    </style>
</head>
<body>
    <br/>
    <br/>
    <center>
    <img src="logo1.png" alt="Laundryin Logo" class="logo">
    </center>
    <br/>
    <br/>
    
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <?php 
            session_start();
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){
                    echo "<div class='alert alert-danger'>Login gagal! username dan password salah!</div>";
                }else if($_GET['pesan'] == "logout"){
                    echo "<div class='alert alert-info'>Anda telah berhasil logout</div>";
                }else if($_GET['pesan'] == "belum_login"){
                    echo "<div class='alert alert-danger'>Anda harus login untuk mengakses halaman admin</div>";
                }
            }
            ?>          
            
            <form action="login.php" method="post">
                <div class="panel">
                    <br/>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>  


                        <input type="submit" class="btn btn-primary" value="Log In">                
                    </div>
                    <br/>
                </div>
            </form>


        </div>
    </div>
</body>
</html>
