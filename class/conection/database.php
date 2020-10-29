<?php

/**
 * Description of database
 * @author juliobillschvenger
 */

class database {

    private static $HOST = "localhost:3306";
    private static $USERNAME = "root";
    private static $PASSWORD = "root";
    private static $DB = "pessoadb";
    private static $conn = null;

    public function __construct() {}

    public static function openConection() {
        if (null == self::$conn) {
            try {
                try {
                    self::$conn = new mysqli(self::$HOST, self::$USERNAME, self::$PASSWORD, self::$DB);
                } catch (Exception $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
            } catch (Exception $exc) {
                echo $exc->getMessage();
            }
        }
        return self::$conn;
    }

    public static function closeConection() {
        return self::$conn = null;
    }
    
}

?>