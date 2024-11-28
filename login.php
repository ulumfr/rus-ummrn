<?php
	session_start();
	include"koneksi.php";
	$username=$_POST['usr'];
	$password=$_POST['psw'];
	$psw=md5($password);
	$sql="select * from students where usr='$username' and psw='$psw'";
	$query=mysqli_query($koneksi,$sql);
	if($hasil=mysqli_fetch_array($query,MYSQLI_NUM)){
		$_SESSION['user']=$username;
		$_SESSION['userid']=$hasil[0];
		$_SESSION['nama']=$hasil[1];
		header("location:index.php");
	}else{
		header("location:index.php?page=login&stat=false");
	}
?>