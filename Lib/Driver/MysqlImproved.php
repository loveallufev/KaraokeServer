<?php
/**
 * File : MysqlImproved.php
 * User : loveallufev
 * Date:  5/17/13
 * Group: Hieu-Trung
*/

require_once(dirname(__FILE__) . "/../Database.php");

class Lib_Driver_MysqlImproved extends Lib_Database{
    /**
     * Connection holds MySQLi resource
     */
    public $connection;

    /**
     * Query to perform
     */
    private $query;

    /**
     * Result holds data retrieved from server
     */
    private $result;

    /**
     * Configuration
     */
    private $config;

    public function __construct($config){
        $this->config = $config;
    }

    /**
     * Create new connection to database
     */
    public function connect()
    {
        try{
            //connection parameters
            $host = $this->config['host'];
            $user = $this->config['username'];
            $password = $this->config['password'];
            $database = $this->config['database'];

            //your implementation may require these...
            $port = isset($this->config['port']) ? $this->config['port'] : null;
            $socket = isset($this->config['socket']) ? $this->config['socket'] : null;

            //create new mysqli connection
            $this->connection = new mysqli
            (
                $host , $user , $password , $database , $port , $socket
            );

            if (empty($this->connection->connect_error)){
                $this->connection->query("SET NAMES utf8");
                return TRUE;
            }

            Lib_Utility::fail('MySQL connect', $this->connection->connect_error);
            return FALSE;
        }
        catch (Exception $e){
            return FALSE;
        }
    }

    /**
     * Break connection to database
     */
    public function disconnect()
    {
        //clean up connection!
        $this->connection->close();

        return TRUE;
    }

    /**
     * Prepare query to execute
     *
     * @param $query
     */
    public function prepare($query)
    {
        //store query in query variable
        $this->query = $query;

        return TRUE;
    }

    /**
     * Execute a prepared query
     */
    public function query()
    {
        if (isset($this->query))
        {
            //execute prepared query and store in result variable
            //$this->result = $this->connection->query($this->query);
            $this->result = mysqli_query($this->connection, $this->query);
            return $this->result;
        }

        return $this->result;
    }

    /**
     * Fetch a row from the query result
     *
     * @param $type
     */
    public function fetch($type = 'object')
    {
        $rows = NULL;
        if (isset($this->result))
        {
            switch ($type)
            {
                case 'array':

                    //fetch a row as array
                    //$row = mysqli_fetch_array($this->result, MYSQLI_NUM);
                    if (!$this->result)
                        return NULL;
                    while($row = mysqli_fetch_array($this->result, MYSQLI_ASSOC))
                    {
                        $rows[] = $row;
                    }

                    break;

                case 'object':

                    //fall through...

                default:

                    //fetch a row as object
                    $rows = $this->result->fetch_object();

                    break;
            }

            return $rows;
        }

        return NULL;
    }

    /**
     * Sanitize data to be used in a query
     *
     * @param $data
     */
    public function escape($data)
    {
        return $this->connection->real_escape_string($data);
    }
}