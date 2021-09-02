<?php
class MembersScript
{
    var $maxLength,
        $lim, /* Num items to show */
        $template, /* Template to use */
        $db_name, /* DB Settings */
        $db_host,
        $db_user,
        $db_password,
        $connection;
   
    function MembersScript()
    {
        // Import Database settings etc.
        require('../resources/config.php');
       
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->lim = $lim;
        $this->template = $template;
    }
   
    /**
     * Display ALL news articles
     *
     */
    function displayAll()
    {
        $this->connect();
       
        // Use the limit in our settings to decide how many to show
        $result = mysql_query("SELECT * FROM memberstbl ORDER BY date DESC LIMIT 0, $this->lim");
       
        /* While we have more rows display them */
        while($row = mysql_fetch_assoc($result))
        {
            // Display the row
            $id = $row['id'];
            $eloRating = $row['eloRating'];
            $date = $this->convertDate($row['date']);
           
            /*
            Variables are used in the template file to display news info
            */
            require($this->template);
           
        }
       
        $this->close();
    }
   
    /**
     * Display a single news item given it's ID.
     *
     * @param $id - ID of item to display
     * @return true/false
     */
    function displayItem($id)
    {
        if(is_numeric($id))
        {
            $this->connect();
           
            $result = mysql_query("SELECT * FROM memberstbl WHERE id = '$id'");
            $row = mysql_fetch_assoc($result);
            
            $eloRating = $row['eloRating'];
            $date = $this->convertDate($row['date']);
           
            require($this->template); // Show item with our template.
           
            $this->close();
            return true;
        }
        else return false; // Not valid number
       
    }
   
    /**
     * Add a News Item to the DB
     *
     * @return true/false (true if we are successful)
     */
    function addMembers($eloRating, $content)
    {
        $this->connect();
       
        // Use MySQL CURDATE function to get the current Date.
        $sql = sprintf("INSERT INTO memberstbl (author, content ,date) VALUES ('%s','%s',CURDATE())",
                                                    $this->clean($author), $this->clean($content));
       
       
        $result = mysql_query($sql, $this->connection);
        $this->close();
       
        // are we successful?
        if($result)
        {
            return true;
        }
        else return false;
    }
   
    /**
     * Deletes the given News Item
     *
     * @return true or false (false if error)
     */
    function deleteMembers($id)
    {
        // Only allow numbers for ID
        if(is_numeric($id))
        {
            $this->connect();
           
            $result = mysql_query("DELETE FROM memberstbl WHERE id='$id'");
           
            $this->close();
           
            // are we successful?
            if($result)
            {
                return true;//yes
            }
            else return false;//no
                                         
        }
        else return false; // None numeric value
    }
   
    /**
     * update a news atricle
     *
     * @param int $id
     * @param str $author
     * @param str $content
     *
     * @return true/false (successful?)
     */
    
    function updateMembers($id, $eloRating, $date)
    {
        if(is_numeric($id))
        {
            $this->connect();
           
            $sql = sprintf("UPDATE memberstbl SET eloRating='%s', date='%s' WHERE id='%d'",
            $this->clean($eloRating), $this->clean($date), $id);
           
            $result = mysql_query($sql);
           
            $this->close();
           
            // are we successful?
            if($result)
            {
                return true;//yes
            }
            else return false;//no
        }
        return false;
    }
   
    /**
     * Connect to DB
     *
     * @return true/false
     */
    function connect()
    {
        $this->connection = mysql_connect($this->db_host, $this->db_user, $this->db_password)
                            or die("Unable to connect to MySQL");
                           
        mysql_select_db($this->db_name, $this->connection) or die("Unable to select DB!");
       
        // Valid connection object?
        if(!$this->connection)
        {
            return false;
        }
        else return true;
    }
   
    /**
     * close DB Connection
     *
     */
    function close()
    {
        mysql_close($this->connection);
    }
   
    /**
     * Convert from MySQL Date format: yyyy-mm-dd
     * into dd/mm/yyyy
     *
     * @param MySQL $date
     * @return string dd/mm/yyyy
     */
    function convertDate($date)
    {
        $date_array = explode("-",$date); // split the array
        $y = $date_array[0];
        $m = $date_array[1];
        $d = $date_array[2];
       
        return $d . "/" . $m . "/" . $y;
    }
   
    
}
?>
