<?php

/* by pit */

$result=$db->Query("SELECT * FROM Users WHERE USER_NAME = '$d_user_name' ");
if($result->num_rows == 0)
{
    $uid=reg_get_unique_id();
    $sql = "INSERT INTO Users (UID, DATE_TIME, USER_NAME, EMAIL, PASS) VALUES ('$uid','$date','$d_user_name','$d_email',MD5('$d_pass'))";
    $db->Query($sql);
    ?>
    <script>setCookie('Login','<?php echo $uid ?>',1);</script>
    <?php
    $msg="<div class='good'>Successful registration! You need to login to access.</div>";
    
}
 else {
    $msg="<span class='alert'>User name already exist!</span>";
}
        
function reg_get_unique_id(){ return md5(uniqid(mt_rand(),true)); }
?>
