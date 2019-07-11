<?php

//$connection = new createConnection(); //i created a new object
//$connection->connectToDatabase(); // connected to the database
//$con = $connection->selectDatabase();

class createConnection //create a class for make connection
{
    var $host="68.178.253.29:3308";
    var $username="czh642494194343";    // specify the sever details for mysql
    Var $password="VhEnE)7zahycI";
    var $database="czh642494194343";
    
    var $myconn;
    /*
    
    var $host = "127.0.0.1";
    var $username = "root";
    var $password = "";
    var $database = "3otal";
    */
    //mysqli_connect('localhost','3otal',''); <<< this worked
    
    function connectToDatabase() // create a function for connect database
    {
    	$conn= mysqli_connect($this->host,$this->username,$this->password);
    	 
        if(!$conn)// testing the connection
        {
            echo "Cannot connect to the database" ;
            die ("Cannot connect to the database");
        }
        else
        {   
            //echo "connect to the database ... " ;
        	$sSQL= 'SET CHARACTER SET utf8'; 
        	mysqli_query($conn,$sSQL) ;
            $this->myconn = $conn;
            //echo "connect to the database ... 2" ;
        }
        return $this->myconn;
    }


 function selectDatabase() // selecting the database.
    {
        mysqli_select_db($this->myconn,$this->database);  //use php inbuild functions for select database
        if(mysqli_error($this->myconn)) // if error occured display the error message
        {
            echo "Cannot find the database ".$this->database;

        }
        $con=mysqli_connect($this->host,$this->username,$this->password,$this->database);
        return $con;
        /*$result = mysqli_query("SELECT * FROM types");
        echo "Database selected..1111----";
        echo "<br />";
        while($row = mysqli_fetch_array($result))
        {
        	echo $row['id'] . " " . $row['name'];
        	echo "<br />";
        }
         echo "Database selected..2222-----";     */  
    }

    function closeConnection() // close the connection
    {
    	if( gettype($this->myconn) == "resource") {
        	mysqli_close($this->myconn);
    	}
    }
 
}
 
?>