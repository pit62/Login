<?php

/* by pit */

class loginClass {
    public $cookies_uid;
    public $user_name;
    public $user_uid;

    function __construct($cookies_name)
    {
        if(isset($_COOKIE[$cookies_name])){
            $this->cookies_uid = $_COOKIE[$cookies_name];
        }
    }
    
    public function checkLogin($db)
    {
        if(isset($this->cookies_uid)){
            $result=$db->Query("SELECT * FROM Session WHERE UID = '$this->cookies_uid' ");
            if ($result->num_rows == 1) { 
                $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $this->user_name=$data['USER_NAME'];
                $this->user_uid=$data['UID'];
                $result->free();
                return true;
            }
        }
        return false;
    }
    
}
?>
