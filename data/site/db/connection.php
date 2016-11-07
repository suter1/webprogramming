<?php

class Database {
    /*
    * Create variables for credentials to MySQL database
    * The variables have been declared as private. This
    * means that they will only be available with the
    * Database class
    */
    private $db_host = "localhost";  // Change as required
    private $db_user = "root";  // Change as required
    private $db_pass = "root";  // Change as required
    private $db_name = "isithombe";    // Change as required

    /*
    * Extra variables that are required by other function such as boolean con variable
    */
    private $con = false; // Check to see if the connection is active
    private $result = array(); // Any results from a query will be stored here
    private $myQuery = "";// used for debugging process with SQL return
    private $numResults = "";// used for returning the number of rows

    // Function to make connection to database
    public function connect() {
        if (!$this->con) {
            $mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            if ($mysqli->connect_errno) {
                echo "Database connection could not be established.";
                return false;
            }
            $this->con = $mysqli;
        }
        return true; // Connection already open or created
    }

    // Function to disconnect from the database
    public function disconnect() {
        if ($this->con) {
            // We have found a connection, try to close it
            $this->con->close();
            $this->con = false;
            return true;

        }
        return false;
    }

    public function sql($sql) {
        $result = $this->rawSql($sql);
        if($result->num_rows === 0) {
            $this->result = null;
            $this->numResults = 0;
            return false;
        }else {
            $this->numResults = $result->num_rows;

            while($row = $result->fetch_assoc())
                array_push($this->result, $row);
            return true; // Query was successful
        }
    }

    /**
     * @param String $sql
     * @return mixed $result
     */
    public function rawSql($sql) {
        $result = $this->con->query($sql);
        if (!$result) {
            echo "Problem occurred with query execution $sql.<br>";
            echo "ErrorNo: " .$this->con->errno . "<br>";
            echo "Error:" . $this->con->error;
            exit;
        }
        return $result;
    }

    /**
     * @param $table
     * @param string $rows
     * @param string $join
     * @param string $where
     * @param string|string $order (asc|desc)
     * @param int $limit
     * @return array|null
     */
    public function select($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null){
        $query = 'SELECT ' . $rows . ' FROM ' . $table;
        if ($join != null)  $query .= ' JOIN ' . $join;
        if ($where != null) $query .= ' WHERE ' . $where;
        if ($order != null) $query .= ' ORDER BY ' . $order;
        if ($limit != null) $query .= ' LIMIT ' . $limit;
        if($this->tableExists($table) && $this->sql($query)) return $this->result;
        return null;
    }

    /**
     * does insert into like: INSERT INTO $TABLE ('name1', 'name2') VALUES ('value1', 'value2');
     *
     * @param $table
     * @param array $params
     * @return bool|mixed
     *
     */
    public function insert($table, $params = array()) {
        // Check to see if the table exists
        if ($this->tableExists($table)) {
            $sql = 'INSERT INTO `' . $table . '` (`' . implode('`, `', array_keys($params)) . '`) VALUES ("' . implode('", "', $params) . '")';
            $this->myQuery = $sql; // Pass back the SQL
            // Make the query to insert to the database

            return $this->rawSql($sql);
        }
        return false; // Table does not exist
    }


    /**
     *  CREATE TABLE whatever (
     *  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     *  firstname VARCHAR(30) NOT NULL,
     *  lastname VARCHAR(30) NOT NULL,
     *  email VARCHAR(50),
     *  reg_date TIMESTAMP
     * @param $table
     * @param $data_types
     * @param bool $override
     */
    public function create_table($table, $data_types, $override = false){
        if($override && $this->tableExists($table)){
            $sql = "DROP TABLE $table";
            $this->rawSql($sql);
        }
        if(!$this->tableExists($table)){
            $sql = "CREATE TABLE $table (";
            $counter = 0;
            foreach ($data_types as $name => $definition){
                $counter += 1;
                $sql .= "$name $definition";
                if($counter < sizeof($data_types)) $sql .= ", ";
            }
            $sql .= ")";
            $this->rawSql($sql);
        }

    }

//Function to delete table or row(s) from database
    /**
     * @param $table
     * @param null $where String with key = 'value'
     * @return bool
     */
    public function delete($table, $where = null) {
        if ($this->tableExists($table)) {
            if ($where == null) {
                $delete = 'DELETE FROM ' . $table;
            } else {
                $delete = 'DELETE FROM ' . $table . ' WHERE ' . $where; // Create query to delete rows
            }
            $this->myQuery = $delete;
            if ($del = $this->sql($delete)) {
                array_push($this->result, $this->con->affected_rows);
                return true; // The query exectued correctly
            } else {
                array_push($this->result, null);
                return false;
            }
        }
        return false;
    }

// Function to update row in database
    /**
     * @param $table String
     * @param $where String
     * @param array $params
     * @return bool
     */
    public function update($table, $where, $params = []) {
        if ($this->tableExists($table)) {
            $args = [];
            foreach ($params as $field => $value) {
                $args[] = $field . '="' . $value . '"';
            }
            $sql = 'UPDATE ' . $table . ' SET ' . implode(',', $args) . ' WHERE ' . $where;
            $this->myQuery = $sql;
            if ($query = $this->sql($sql)) {
                array_push($this->result, $this->con->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->con->error);
                return false; // Update has not been successful
            }
        }
        return false;

    }

// Private function to check if table exists for use with queries
    private function tableExists($table) {
            $tablesInDb = $this->con->query('SHOW TABLES FROM ' . $this->db_name . ' LIKE "' . $table . '"');

        if ($tablesInDb) {
            if ($tablesInDb->num_rows == 1) {
                return true;
            } else {
                array_push($this->result, $table . " does not exist in this database");
                return false;
            }
        }
    }

// Public function to return the data to the user
    public function getResult() {
        $val = $this->result;
        $this->result = array();
        return $val;
    }

//Pass the SQL back for debugging
    public function getSql() {
        $val = $this->myQuery;
        $this->myQuery = array();
        return $val;
    }

//Pass the number of rows back
    public function numRows() {
        $val = $this->numResults;
        $this->numResults = array();
        return $val;
    }

// Escape your string
    public function escapeString($data) {
        return $this->con->real_escape_string($data);
    }
}