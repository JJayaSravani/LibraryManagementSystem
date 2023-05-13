<?php error_reporting(E_ERROR | E_PARSE);
$con= new mysqli("localhost","root","","library");
//insert code
$bid=$_POST["book_id"];
$bname=$_POST["book_name"];
$auth=$_POST["author"];
$nop=$_POST["no_of_pages"];
$cat=$_POST["category"];
$sql="insert into books (`book_id`, `book_name`, `author`, `no_of_pages`, `category`) VALUES ('$bid', '$bname', '$auth', '$nop','$cat');";
$res=$con->query($sql);

//del code
$bid=$_POST["del_book"];
   $sql="DELETE FROM `books` WHERE book_id='$bid';";
   $res=$con->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin logged</title>
    <style>
    body {
 background-image: url("bg.jpg");
 background-color: #cccccc;
 background-repeat: no-repeat;
 background-size: 2000px 900px;
} 
.form{
  padding: 20px 0px;	
	position: relative;	
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
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
#head{
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
<h4 id="head">Logged in successfully as Admin<h4>
 
<br>
    <br>
    <div align="center" class="myDiv"><br><br>
<?php $sql="SELECT * FROM books;";
    $res=$con->query($sql);
    ?>
    <h3>Books present in the library</h3>
    <table border=1 align="center" >
        <tr>
            <th>book id</th>
            <th>book name</th>
            <th>author</th>
            <th>no of pages</th>
            <th>category</th>
    <?php
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
    ?>
</table><br><br>
<form action="admindemo.php" method="post" class="form"><br>
    book id:<input type="number" id="book_id" name="book_id"><br>
   <br> book name:<input type="text" id="book_name" name="book_name"><br>
    <br>author:<input type="text" id="author" name="author"><br>
    <br>no of pages:<input type="number" id="no_of_pages" name="no_of_pages"><br>
    <br>category:<select name="category">
                                    <option value="CSE">CSE</option>
                                    <option value="CIVIL">CIVIL</option>
                                    <option value="MECH">MECH</option>
                                    <option value="IT">IT</option>
                                    <option value="AI">AI</option>
                                    <option value="AIML">AIML</option>
</select><br><br>
<button class="btn">add book</button>
</form>
<form action="admindemo.php" method="post" align="center" >
    <input type="number" id="del_book" name="del_book">
    <button class="btn" >delete book</button>
   
</form>
<!--logout-->
</div>
<form name="form1" method="post" action="index.html" >
  <label class="logoutLblPos">
  <input name="submit2" type="submit" id="submit2" value="log out">
  </label>
</form>
</body>
</html>