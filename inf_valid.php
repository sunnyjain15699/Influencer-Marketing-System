<?php


session_start();
header('location:inf_login.php');

$conn = mysqli_connect('localhost','root','', 'influencer_marketing') or die(mysqli_error());


if(isset($_POST['submit']))
{


$name=$_POST['username'];

$pass=$_POST['password'];

$query="select * from influencer where inf_username ='".$name."' AND inf_password ='".$pass."'";
$result=mysqli_query($conn,$query);

$num=mysqli_num_rows($result);
if($num==1)
{	
	$_SESSION['username']=$name;
	header('location:infdashboard.php');
}
else
{
	header('location:inf_login.php');
}

}
else
{

echo "bye";

}

?>