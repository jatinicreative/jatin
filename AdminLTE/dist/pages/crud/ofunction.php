<?php

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'admin123');
define('DB_NAME', 'crud');
class CRUD
	{
		private $con;
	function __construct()
	{
	$this->con=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
 	}
	}
	public function insert($first_name,$last_name,$email,$pass,$target_file,$address,$phone,$gender,$hobby,$country)
	{
	$ret=mysqli_query($this->con,"INSERT into user(first_name, last_name, email, pass, file, address, phone, gender, hobby, country) values('$first_name', '$last_name', '$email', '$pass', '$target_file', '$address', '$phone', '$gender', '$hobby', '$country')");
	return $ret;
	}
	public function fetchdata()
	{
	$result=mysqli_query($this->con,"SELECT * from user");
	return $result;
	}
	public function update($first_name,$last_name,$email,$address,$phone,$gender,$hobby,$country)
	{
	$updaterecord=mysqli_query($this->con,"UPDATE user SET first_name='$first_name', last_name='$last_name', email='$email', 
              address='$address', phone='$phone', gender='$gender', hobby='$hobby', country='$country'" );
	return $updaterecord;
	}
	public function delete($rid)
	{
	$deleterecord=mysqli_query($this->con,"delete from tblusers where id=$rid");
	return $deleterecord;
	}
}