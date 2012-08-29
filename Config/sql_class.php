<?php
class db_Mysql
{
    var $dbServer;
    var $dbDatabase;
    var $dbbase;
    var $dbUser;
    var $dbPwd;
    var $dbLink;
    var $result;
    var $result;
    var $num_rows;
    var $insert_id;
    var $affected_rows;

    function dbConnect()
    {
        $this->dbLink=$mysql_connect($this->dbServer,$this->dbUser,$tshi->dbPwd);
        if(!$this->dbLink)
            $this->dbhalt("can not connect");
        if($this->dbbase=="")
            $this->dbbase=$this->dbDatabase;
        if(!mysql_select_db($this->dbbase,$this->dbLink))
            $this->dbhalt("can not select");
    }

    function execute($sql)
    {
        
    }
}
?>
