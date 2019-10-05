<?php 
class DB{

    var $_dbConn = 0;
    var $_queryResource = 0;
    

    function DB()
    {

        //do nothing
    }
    
    function connect_db($host, $user, $pwd, $dbname)
    {
        $conn = mysqli_connect($host, $user, $pwd);
        if (empty($conn)){
                    print mysqli_error($conn);
                    die ("無法連結資料庫");
                    exit;
         }
         mysqli_query( $conn, "SET NAMES 'utf8'");

        return true;
    }
    
    function query($sql)
    {
              
    }
    
    /** Get array return by MySQL */
    function fetch_array()
    {
       
    }
    
    function get_num_rows()
    {
        
    }

    /** Get the cuurent id */    
    function get_insert_id()
    {
        
    } 
    
 }



?>