<?php
/**
 * @File : Connection.php
 * @Class : Connection
*/

// Including DB constants
include_once dirname(__FILE__) . '/Constants.php';

class Connection{

    // declaring connection variable
    private $conn;
    
    // constructor
    function __construct(){
        try{
            $this->conn = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER , DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            exit("Exception: ".$e->getMessage());
        }
    }

    /**
     * Common dynamic CRUD functions
     * 
     * 1) insertData(query); 
     * [-> query cannot be 'NULL'
     *  -> query should be string if SQL insert statement]
     * 
     * 2) readData(query);
     * [-> query can not be 'NULL'
     *  -> query should be string if SQL select statement]
     * 
     * 3) updateData(query);
     * [-> query can not be 'NULL'
     *  -> query should be string if SQL update statement ]
     * 
     *  4) deleteData(query); 
     * [-> query can not be 'NULL'
     *  -> query should be string if SQL update statement ]
     */

     // 1) dynamic insert function
     function insertData($query){
        // preparing the query statement
        $stat = $this->conn->prepare($query);
        // Check if query execution is successful
        if($stat->execute()){
            return VALUE_INSERTED;
        }else{
            return VALUE_NOT_INSERTED;
        }
     }

    // 2) dynamic read function
    function readData($query){
       // preparing the query statement
       $stat = $this->conn->prepare($query);
       //executing statement
       $stat->execute();
       //
       $rowCount = $stat->rowCount();
       if($rowCount > 0){
           if($rowCount > 1){
             $result= $stat->fetchAll();
             return $result;
           }else{
               $result = array();
               $row = $stat->fetch();
               array_push($result, $row);
               return $result;               
            }
        }else{
           return VALUE_NOT_FOUND;
       }
    }

     // 3) dynamic update function
    function updateData($query){
        // preparing the query statement
        $stat = $this->conn->prepare($query);
        // Check if query execution is successful
        if($stat->execute()){
            return VALUE_UPDATED;
        }else{
            return VALUE_NOT_UPDATED;
        }
    }

     // 4) dynamic delete function
    function deleteData($query){
        // preparing the query statement
        $stat = $this->conn->prepare($query);
        // check if query execution is successful
        if($stat->execute()){
            return VALUE_DELETED;
        }else{
            return VALUE_NOT_DELETED;
        }
    }

    // destructor
    function __destruct(){
        $this->conn = null;
    }
}



?>