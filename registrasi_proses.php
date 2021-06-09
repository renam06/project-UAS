 <?php 
include "koneksi.php";
  if(isset($_POST['daftar'])){
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $username = $_POST['username'];
    $no_tlp   = $_POST['no_tlp'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password == $password_confirm ){
      $cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username='$_POST[username]'");
          if(mysqli_num_rows($cek_user) > 0){
            echo'<script language="javascript"> 
                  alert("Username sudah digunakan");
                  window.location="registrasi.php";
                </script>';
                exit();
          } else{

            $password = SHA1($password);
            $password_confirm = SHA1($password_confirm);

            $query = mysqli_query($conn, "INSERT INTO user(nama, email, username, no_tlp, password, password_confirm) VALUES ('$nama', '$email', '$username', '$no_tlp','$password', '$password_confirm')");


            echo'<script language="javascript">
                  alert("Registrasi Berhasil!");
                  window.location="login.php"
                  </script>';

                  exit();
          }

    } else{
        echo'<script language="javascript"> 
                  alert("Password tidak sama");
                  window.location="registrasi.php";
                </script>';
                exit();
    }

}


 ?>