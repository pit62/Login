<?php

/* by pit */


$this->dbtbles=array(
    array('Users','CREATE TABLE IF NOT EXISTS Users ('.
                'ID integer UNSIGNED NOT NULL AUTO_INCREMENT,'.
                'UID char(32) NOT NULL,'.
                'DATE_TIME datetime NOT NULL,'.
                'USER_NAME varchar(15) NOT NULL,'.
                'EMAIL varchar(25),'.
                'PASS CHAR(32),'.
                'PRIMARY KEY ( ID,USER_NAME )'.
                ' )'),
    
    array('Session','CREATE TABLE IF NOT EXISTS Session ('.
                'UID char(32) NOT NULL,'.
                'USER_NAME varchar(15) NOT NULL,'.
                'CREATION_DATE datetime NOT NULL,'.
                'INDEX(UID)'.
                ' )')
    );
        
?>
