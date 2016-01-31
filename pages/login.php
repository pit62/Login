<?php

/* by pit */

$sql = "SELECT * FROM Users WHERE USER_NAME = '$d_user_name' AND PASS = md5('$d_pass')";
$result=$db->Query($sql);
if($result->num_rows == 1)
{
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $uid=$data['UID'];
    $sql="SELECT * FROM Session WHERE UID = '$uid'";
    $session=$db->Query($sql);
        if ($session->num_rows == 1) {
            $msg="<span class='alert'>Already logged!</span>";
            $session->free();
        }
        else {
        $date=date("Y-m-d H:i:s");
        $sql = "INSERT INTO Session (UID, USER_NAME, CREATION_DATE) VALUES ('$uid','$d_user_name','$date')";
        $session=$db->Query($sql);
        $msg="<span class='good'>Login executed.</span>";
        }
    $result->free();
}
 else {
    $msg="<span class='alert'>Unknow user!</span>";
}
?>
