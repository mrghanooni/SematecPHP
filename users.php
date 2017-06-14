<?php
$title = "User List of MR Cafe!";
include "header.php";
include "db.php";
?>


<html>
<head>
<br>
<br>
<br>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
</head>
<body>

<?php
	
  $conn= getconnected();
  $query= "select * from users";
  $result= $conn->query($query);
  //echo $result->fetch_assoc();
    
  echo "<table style='width:80%' align='center'><caption>MR Cafe User List</caption>";
  echo "<thead><tr><th>Operation</th><th>Name</th><th>Email</th><th>Avatar</th></tr></thead>";
  while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $name= $row['Name'];
    $email= $row['Email'];
    $id=$row['id'];
	$avatar=$row['avatar'];
    echo "<tr><td>
    <input type='hidden' value='$id'>
    <a href='destination.php?job=edituser&id=$id'>Edit</a>
    <a href='destination.php?job=deleteuser&id=$id'>Delete</a>
    </td></thead>";
    echo "<td class='editableColumns' id='name$id'>".$name."</td>";
    echo "<td>".$email."</td>";
    echo "<td><img src=$avatar style='width:60px; height:60px;'></td></tr></thead>";

  }
  echo "</table>";

?>
	
	



</body>
</html>