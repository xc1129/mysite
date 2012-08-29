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
        $this->dbLink=$mysql_connect($this->dbServer,$this->dbUser,$this->dbPwd);
        if(!$this->dbLink)
            $this->dbhalt("can not connect");
        if($this->dbbase=="")
            $this->dbbase=$this->dbDatabase;
        if(!mysql_select_db($this->dbbase,$this->dbLink))
            $this->dbhalt("can not select");
    }

    function execute($sql)
    {
        $this->result=mysql_query($sql);
        return $this->result;        
    }

    function fetch_array($result)
    {
        return mysql_fetch_array($result);
    }

    function get_rows($sql)
    {
        return mysql_num_rows(mysql_query($sql));
    }

    function num_rowsrows($result)
    {
        return mysql_num_rows($result);
    }

    function data_seek($result,$rowNumber)
    {
        return mysql_data_seek($result,$rowNumber);
    }

    function dbhalt($errmsg)
    {
        $msg="database is wrong!";
        $msg=$errmsg;
        echo "$msg";
        die();
    }

    function delete($sql)
    {
        $result=$this->execute($sql,$dbbase);
        $this->affected_rows=mysql_affected_rows($this->dbLink);
        $this->free_result($result);
        return $this->affected_rows;
    }

    function insert($sql)
    {
        $result=$this->execute($sql,$dbbase);
        $this->insert_id=mysql_insert_id($this->dbLink);
        $this->free_result($result);
        return $this->insert_id;
    }

    function update($sql)
    {
        $result=$this->execute($sql,$database);
        $this->affected_rows=mysql_affected_rows($this->dbLink);
        $this->free_result($result);
        return $this->affected_rows;
    }

    function get_num($result)
    {
        $num=@mysql_num_rows($result);
        return $num;
    }

    function free_result($result)
    {
        @mysql_free_result($result);
    }

    function dbclose()
    {
        mysql_close($this->dbLink);
    }
}//end class
?>
