<?php

/* by pit */

$sql="DELETE FROM Session WHERE USER_NAME = '$login->user_name' AND UID = '$login->user_uid'";
if (!$db->Query($sql)) {
    $msg="<span class='good'>Erron on logging out from site! Retry.</span>";
}
$msg="<span class='good'>Logout executed.</span>";
    
?>

