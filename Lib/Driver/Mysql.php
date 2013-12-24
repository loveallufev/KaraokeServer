<?php
/**
 * File : MysqlImproved.php
 * User : loveallufev
 * Date:  5/17/13
 * Group: Hieu-Trung
 */

require_once(dirname(__FILE__) . "/../Database.php");

class Lib_Driver_Mysql extends Lib_Databaseprotected{

    public $db;
    public $stmt;
    private $config;

    public function __construc($config){
        $this->config = $config;
    }

    function connect()
    {
        //connection parameters
        $host = $this->config['host'];
        $user = $this->config['username'];
        $password = $this->config['password'];
        $database = $this->config['database'];

        //your implementation may require these...
        $port = isset($this->config['port']) ? $this->config['port'] : null;
        $socket = isset($this->config['socket']) ? $this->config['socket'] : null;

        $this->db = new mysqli($host, $user, $password, $database, $port , $socket);

        if (mysqli_connect_errno()){
            Lib_Utility::fail('MySQL connect', mysqli_connect_error());
            return false;
        }

        return true;

    }

    protected function disconnect()
    {
        $this->stmt->close();
        $this->db->close();
    }

    protected function prepare($query)
    {
        ($this->stmt = $this->db->prepare($query)) || fail('MySQL prepare', $this->db->error);
        return $this->stmt;
    }

    protected function query()
    {
        return $this->stmt->execute();
    }

    protected function fetch($type = 'object')
    {
        // TODO: Implement fetch() method.
    }
}