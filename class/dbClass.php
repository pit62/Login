<?php
/* by pit */

class dbClass {
    private $use_link;
    private $dbhost;
    private $dbuser;
    private $dbpwd;
    private $dbname;
    public  $dberror;
    public  $dbtbles;
    
    function __construct($dbconfig)
    {
        include_once(dirname(__FILE__)."/".$dbconfig);
        $this->dbhost = "host_name";
        $this->dbuser = "user_name";
        $this->dbpwd = "password";
        $this->dbname = "db_login"; /*your database name*/
        $test=false; if ($test) { include "connection.php"; } /*for my connections parameters*/
    }
    function __destruct()  
    {
        if($this->use_link){ $this->use_link->close();}
    }
    public function OpenConnection()
    {
        if ($this->use_link) { return true; }
        $link=new mysqli($this->dbhost,$this->dbuser,$this->dbpwd,$this->dbname);
        $this->dberror=$link->connect_errno;
        if ($link->connect_errno) {printf("<div id='alert'>Connection to Host: %s failed! Error: %s</div>",$this->dbhost,$link->connect_error);return (false);}
        $this->use_link = $link;
        return ($link);      
    }
    public function CloseConnection()
    {
        $link = $this->use_link;
        if (!$link)  { return true; }
        if ($link->close()) { return true; }
        return false;
    }
    public function Query($query)
    {
        $link = $this->use_link;
        if (!$link) { return false; }
        $result = $link->query($query);
        if ($link->error) { printf("Error: %s<br>", $link->error); return false; }
        return $result;
    }
    public function Init()
    {
        $link=new mysqli($this->dbhost,$this->dbuser,$this->dbpwd);
        if ($link->connect_errno) {printf("<div id='alert'>Connection to Host: %s failed! Error: %s</div>",$this->dbhost,$link->connect_error);return (false);}

        if ($_SERVER['SERVER_NAME'] == "127.0.0.1" || $_SERVER['SERVER_NAME'] == "localhost" ) {
            $link->query("CREATE DATABASE IF NOT EXISTS $this->dbname CHARACTER SET = 'utf8'");
            if ($link->error) { printf("<div id='alert'>Error: %s</div>", $link->error);die("End");}
            /*else {  echo "result $result DATABASE $this->dbname CREATED!<br>";   }*/
        
            $link->select_db($this->dbname);
            if ($link->error) { printf("<div id='alert'>Error: %s</div>", $link->error);return (false);}

            foreach ($this->dbtbles as $value) 
            {
            $link->query($value[1]);
            if ($link->error) { printf("Error: %s<br>", $link->error); return false; }
                    /*echo "result $result Table ".$value[0]." created!<br>";*/
            }
        }
        return true;
    }

    
}

?>
