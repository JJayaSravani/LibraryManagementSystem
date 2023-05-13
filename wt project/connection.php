<?php //database users are only validated 
error_reporting(E_ERROR | E_PARSE);
$con=new mysqli("localhost","root","","library");
$name=$_POST["name"];
$htn=$_POST["htn"];
$pswd=$_POST["pswd"];
if($con->connect_error)
{
    die("connetion error");
}
else{
   /* $sql = "SELECT * FROM login WHERE htn=?"; // SQL with parameters
    $stmt = $conn->prepare($sql); */
    $stmt= $con->prepare("select * from login where htn  =?");
    $stmt->bind_param("s",$htn);
    $stmt->execute();
    $stmt_result= $stmt-> get_result();
    if($stmt_result->num_rows>0)
    {
        $data =$stmt_result->fetch_assoc();
        echo "<br>";
        if($data['pswd']==$pswd && $data['name']==$name)
        {
            if($name=='jaya sravani')
            {
                header("Location: user1_logged.php");
            }
            else if($name=='sai prathibha')
            {
                header("Location: user2_logged.php");
            }
            else{
                header("Location: user_dummy.php");
            }

        }
        else{
            echo"invalid password or htno";
        }
    }
    else{
        echo" <h2> invalid htno or password</h2>";
    }

}
?>
