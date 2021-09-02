<!-- <?php
class TournamentScript
{
    var $maxLength,
        $lim, /* Num items to show */
        $template, /* Template to use */
        $db_name, /* DB Settings */
        $db_host,
        $db_user,
        $db_password,
        $connection;
   
    function TournamentScript()
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
     * Display ALL tournaments
     *
     */
    function displayAll()
    {
        $this->connect();
       
        // Use the limit in our settings to decide how many to show
        $result = mysql_query("SELECT * FROM tournamentstbl ORDER BY date DESC LIMIT 0, $this->lim");
       
        /* While we have more rows display them */
        while($row = mysql_fetch_assoc($result))
        {
            // Display the row
            $id = $row['id'];
            $tournament = $row['Tournament'];
            $date = $this->convertDate($row['Date']);
            $location = $row['Location'];
           
            /*
            Variables are used in the template file to display tournaments
            */
            require($this->template);
           
        }
       
        $this->close();
    }
   
    /**
     * Display a single tournament item given it's ID.
     *
     * @param $id - ID of item to display
     * @return true/false
     */
    function displayItem($id)
    {
        if(is_numeric($id))
        {
            $this->connect();
           
            $result = mysql_query("SELECT * FROM tournamentstbl WHERE id = '$id'");
            $row = mysql_fetch_assoc($result);
           
            $tournament = $row['Tournament'];
            $date = $this->convertDate($row['Date']);
            $location = $row['Location'];
           
            require($this->template); // Show item with our template.
           
            $this->close();
            return true;
        }
        else return false; // Not valid number
       
    }
   
    /**
     * Add a Tournament Item to the DB
     *
     * @return true/false (true if we are successful)
     */
    function addTournament($tournament, $location, $date)
    {
        $this->connect();
       
        $sql = sprintf($this->clean($tournament), $this->clean($date), $this->clean($location));
       
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
     * Deletes the given Tournament Item
     *
     * @return true or false (false if error)
     */
    function deleteTournament($id)
    {
        // Only allow numbers for ID
        if(is_numeric($id))
        {
            $this->connect();
           
            $result = mysql_query("DELETE FROM tournamentstbl WHERE id='$id'");
           
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
     * update a tournament
     *
     * @param int $id
     * @param str $tournament
     * @param date $date
     * @param str $location
     *
     * @return true/false (successful?)
     */
    function updateTournament($id, $tournament, $date, $location)
    {
        if(is_numeric($id))
        {
            $this->connect();
           
            $sql = sprintf("UPDATE tournamentstbl SET tournament='%s', date='%s', location='%s' WHERE id='%d'",
            $this->clean($tournament), $this->clean($date), $this->clean($location), $id);
           
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
   
    /**
     * Cleans a string for input into a MySQL Database.
     * Gets rid of unwanted characters/SQL injection etc.
     *
     * @return string
     */
    function clean($str)
    {
        // Only remove slashes if it's already been slashed by PHP
        if(get_magic_quotes_gpc())
        {
            $str = stripslashes($str);
        }
        // Let MySQL remove nasty characters.
        $str = mysql_real_escape_string($str);
       
        return $str;
    }
}
?>
 -->
