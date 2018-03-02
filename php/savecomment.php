<?php
/**
 * save comment
 * function
 */

session_start();

//login check
if(empty($_SESSION['username']))
{
    include './destroy.php';
    header("Location:../index.php");
    exit();
}

$username = $_SESSION['username'];
$content = $_POST['content'];
$no = $_GET['no'];


require './dbconnect.php';


//save title, content, author to list
$sql = "insert into comment (Pno,Cauthor,Ccontent) VALUES ('$no','$username','$content')";
$res = mysqli_query($con, $sql);

if(mysqli_affected_rows($con)) {
    print_r("comment succeeded");
}
else {
    print_r("comment failed");
}

$Cno = mysqli_insert_id($con);
print_r('Cno: '.$Cno.'<br>');

/*update latest reply time*/
$res = mysqli_query($con, "select * from comment where Cno = $Cno");
$row = mysqli_fetch_array($res);
$Cdate = $row['Cdate'];

print_r('<br>'.$Cdate);

$sql = "update list set latest_reply = '$Cdate' where no = $no";
$res = mysqli_query($con, $sql);
mysqli_affected_rows($con);


header("location:./post.php?no=$no");

//mysqli_free_result($res);
mysqli_close($con);
exit();

?>