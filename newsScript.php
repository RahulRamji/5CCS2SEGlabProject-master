<!-- <?php
class NewsScript
{
    var $maxLength,
        $lim, /* Num items to show */
        $template, /* Template to use */
        $db_name, /* DB Settings */
        $db_host,
        $db_user,
        $db_password,
        $connection;
   
    function NewsScript()
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
        $result = mysql_query("SELECT * FROM newstbl ORDER BY date DESC LIMIT 0, $this->lim");
       
        /* While we have more rows display them */
        while($row = mysql_fetch_assoc($result))
        {
            // Display the row
            $id = $row['id'];
            $author = $row['author'];
            $content = $row['content'];
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
           
            $result = mysql_query("SELECT * FROM newstbl WHERE id = '$id'");
            $row = mysql_fetch_assoc($result);
           
            $author = $row['author'];
            $content = $row['content'];
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
    function addNews($author, $content)
    {
        $this->connect();
       
        // Use MySQL CURDATE function to get the current Date.
        $sql = sprintf("INSERT INTO newstbl (author, content ,date) VALUES ('%s','%s',CURDATE())",
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
    function deleteNews($id)
    {
        // Only allow numbers for ID
        if(is_numeric($id))
        {
            $this->connect();
           
            $result = mysql_query("DELETE FROM newstbl WHERE id='$id'");
           
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
    function updateNews($id, $author, $content)
    {
        if(is_numeric($id))
        {
            $this->connect();
           
            $sql = sprintf("UPDATE newstbl SET author='%s', content='%s' WHERE id='%d'",
            $this->clean($author), $this->clean($content), $id);
           
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
