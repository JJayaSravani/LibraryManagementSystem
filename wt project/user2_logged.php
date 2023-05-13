<?php error_reporting(E_ERROR | E_PARSE);
$con= new mysqli("localhost","root","","library");
    $sql="SELECT * FROM books;";
    $res=$con->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
 background-image: url("bg.jpg");
 background-color: #cccccc;
 background-repeat: no-repeat;
 background-size: 2000px 900px;
} 
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
.myDiv {
    border-radius: 25px;
  border: 2px solid #73AD21;
  width: 1000px;
  height: 650px;
  background-color:white;
  text-align: center;
  position: absolute;
  right: 270px;
  top: 50px;
  
}
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 80%;
  border: 1px solid #ddd;
  text-align: center;
  background-color: #f2f2f2
}

th, td {
  
  padding: 7px;
}

tr:nth-child(even) {
  background-color: #cfeea4;
}
.logoutLblPos
{
  background-color:#1D2C50;
				border-radius: 4px;
				box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
				border: none;
				color: #CAD6F0;
				position: absolute;
  right: 50px;
  top: 50px;
}
.head{
    color:white;
}
</style>
    <script>
    .logoutLblPos{
        position:fixed;
        right:10px;
        top:5px;
        }</script>
</head>
<body>
<h3 class="head">Hey, Welcome to digital library</h3>
    <div align="center" class="myDiv">
        <br>
        <h3>Available books in Library</h3>
    <table border=1 align="center">
            <th>Book_id</th>
            <th>Book_name</th>
            <th>Author</th>
            <th>No of pages</th>
            <th>Category</th>
</tr>
<?php

if(!$res)
{
    die("invalid query".$con->connect_error);  
}
else if($res->num_rows>0){
    while($rows=mysqli_fetch_assoc($res))
    {
        if($rows['book_name']!=NULL)
        {
    ?>
    <tr>
        <td><?php echo $rows['book_id'];?></td>
        <td><?php echo $rows['book_name'];?></td>
        <td><?php echo $rows['author'];?></td>
        <td><?php echo $rows['no_of_pages'];?></td>
        <td><?php echo $rows['category'];?></td>
    </tr>
    <?php
    }}
}
else{
    echo"no result";
}
?>
</table>
<br><br>
<!--add and del btn-->
<form action="user2_logged.php" method="post">
Enter Book ID:<input type="text" name="add_id" id="add_id">
    <button class="btn">add book</button>
</form><br>
<form action="user2_logged.php" method="post">
Enter Book ID:<input type="text" name="del_id" id="del_id">
    <button class="btn">delete book</button>
</form>

<!--php for insert-->
<?php
$bid=$_POST["add_id"];
$rec="INSERT INTO u2 SELECT * FROM books WHERE book_id='$bid';";
$recres=$con->query($rec);
?>
<!--php for delete-->
<?php
$bid=$_POST["del_id"];
$rec="delete from u2 where book_id='$bid';";
$res=$con->query($rec);?>
<!--user table-->
<h3>Your books</h3> 
<table border=1 align="center">
        <tr>
            <th>Book_id</th>
            <th>Book_name</th>
            <th>Author</th>
            <th>No of pages</th>
            <th>Category</th>
</tr>
<?php
$sql2="SELECT * FROM u2;";
$res2=$con->query($sql2);
    while($rec2=mysqli_fetch_assoc($res2))
    {
        if($rec2['book_name']!=NULL)
        {
?>
    <tr>
       <td><?php echo $rec2['book_id'];?></td>
        <td><?php echo $rec2['book_name'];?></td>
        <td><?php echo $rec2['author'];?></td>
        <td><?php echo $rec2['no_of_pages'];?></td>
        <td><?php echo $rec2['category'];?></td>
    </tr>
<?php
        }
    }
?>
</table>
</div>
<!--logout butn-->
<form  align="right" name="form1" method="post" action="index.html">
  <label class="logoutLblPos">
  <input name="submit2" type="submit" id="submit2" value="log out">
  </label>
</form>
</body>
</html>