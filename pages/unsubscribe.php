<?php

/* by pit */

$sql = "SELECT * FROM Users WHERE USER_NAME = '$d_user_name' AND UID = '$login->cookies_uid' AND PASS = md5('$d_pass')";
$result=$db->Query($sql);
if($result->num_rows == 1)
{
    $sql="DELETE FROM Users WHERE USER_NAME = '$d_user_name' AND UID = '$login->cookies_uid'";
    if ($db->Query($sql)) {
        ?>
        <script>setCookie('Login','',-1);</script>
        <?php
        $msg="<span class='good'>Registration canceled.</span>";
    }
    else {
        $msg="<span class='alert'>Erron on unsubscribe from site! Retry.</span>";
    }
    $result->free();
}
else {
    $msg="<span class='alert'>Unknow user!</span>";
}

?>
