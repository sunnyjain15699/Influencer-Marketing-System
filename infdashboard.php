<?php

session_start();//so that iif u go back from homepage and return name should not be seen

if (!isset($_SESSION['username'])) 
{
	header('location:inf_login.php');
}


?>

<?php

$connection = mysqli_connect('localhost','root','', 'influencer_marketing');

if(!$connection)
{
    die ("Connection failed " . mysqli_error());
}

else{
	echo "We are Connected";
}


?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body style="background: url(black_back.jpg); background-size: cover">
<center>
    <h1 style="color: white" align="center"><i>Dashboard For Influencers</i></h1>
    <div style="background: white;width: 70%;border-radius: 0px;height: 80%">

<?php
  
    $query = "select * from influencer where inf_username='".$_SESSION['username']."'";
    $select_inf_by_id = mysqli_query($connection, $query);

    while ($row =mysqli_fetch_assoc($select_inf_by_id))
    {
        $inf_id = $row['inf_id'];
        $inf_name = $row['inf_name'];
        $inf_username = $row['inf_username']; 
        $inf_password = $row['inf_password'];
        $inf_email = $row['inf_email'];
        $inf_genre = $row['inf_genre'];
        $inf_platform = $row['inf_platform'];
        $inf_avg_likes = $row['inf_avg_likes'];
        $inf_gender = $row['inf_gender'];
        $inf_contact = $row['inf_contact'];
        $inf_age = $row['inf_age'];

    }


?>
<br>
<br>
<div style="margin-right: 50%;height: 50%">
<table cellpadding="5px">
    <tr>
        <th>Influencer name : </th>
        <td> <?php echo "$inf_name"; ?> </td>
    </tr>
     <tr>
        <th>Influencer Username : </th>
        <td> <?php echo "$inf_username"; ?> </td>
    </tr>
    <tr>
        <th>Influencer Gender : </th>
        <td> <?php echo "$inf_gender"; ?> </td>
    </tr>    
    <tr>
        <th> Influencer Email : </th>
        <td> <?php echo "$inf_email"; ?> </td>
    </tr>

    <tr>
        <th>Influencer Genre : </th>
        <td> <?php echo "$inf_genre"; ?> </td>
    </tr>

    <tr>
        <th>Influencer Platform : </th>
        <td> <?php echo "$inf_platform"; ?> </td>
    </tr>

    <tr>
        <th>Influencer Average Likes : </th>
        <td> <?php echo "$inf_avg_likes"; ?> </td>
    </tr>



    <tr>
        <th>Influencer Contact : </th>
        <td> <?php echo "$inf_contact"; ?> </td>
    </tr>
</table>
</div>
<style>
#but {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #339933;
  color: white;
}
</style>
<br>
<a href="inf_logout.php">Logout</a>
<?php
$query=" select * from brand group by brand_genre";
$rec_set=mysqli_query($connection,$query) or die(mysqli_error());
echo "<HTML>";
echo "<form method=POST action=\"infdashboard.php\">";
echo "<select name=genre>";

while ($rec=mysqli_fetch_assoc($rec_set)) 
{
    echo "<option value =".$rec['brand_genre'].">".$rec['brand_genre']."</option>";
}
echo "</select>";
echo "<br>";
echo "<input id=\"but\" type=submit name=submit value=\"Find Brands of genre\">";
echo "</form>";
echo "</HTML>";

?>


<?php

if(isset($_POST['submit']))
 {
$drop = $_POST['genre'];

$query = "SELECT * from brand WHERE brand_genre='".$drop."'";
$select_users = mysqli_query($connection, $query); ?>
<table border="2px" >
<thead>
<tr>
<th> Name </th>
<th> Genre </th>
<th> Email</th>
<th>Contact</th>

</tr>
</thead>

<tbody>
<?php

while ($row =mysqli_fetch_assoc($select_users))
    {
        $brand_name = $row['brand_username'];
        $brand_genre = $row['brand_genre'];
        $brand_email = $row['brand_email'];
        $brand_contact = $row['brand_contact'];

        echo "<tr>";
        echo "<td> $brand_name </td>";
        echo "<td> $brand_genre </td>";
        echo "<td> $brand_email </td>";
        echo "<td> $brand_contact</td>";
        echo "</tr>";
    }

}

?>
</table>
</div>
</center>
</div>
</body>
</html>