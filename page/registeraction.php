<?php
	include"koneksi.php";
	$name=$_POST['name'];
	$nim=$_POST['nim'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$description=$_POST['description'];
	$usr=$_POST['usr'];
	$psw=$_POST['psw'];
    $pswmd5=md5($psw);
    
	$sql="insert into students(name,nim,phone,email,usr,psw,description) values('$name','$nim','$phone','$email','$usr','$pswmd5','$description')";
	$query=mysqli_query($koneksi,$sql);
    if($query){
        echo"
            <script>
                window.alert('Registration Succeed.');
                window.location.href='/index.php?page=login';
            </script>
        ";
    }else{
        echo"
            <script>
                window.alert('Registration Failed.');
                window.location.href='/index.php?page=register';
            </script>
        ";
    }
?>