<?php

class Log {
	

const USER_ERROR_DIR = 'errors/Site_User_Errors.log';
const GENERAL_ERROR_DIR = 'errors/Site_General_Errors.log';
  /*
   User Errors...
  */
    public static function user($msg,$username)
    {
    $date = date('d.m.Y h:i:s');
    $log = $msg."   |  Date:  ".$date."  |  User:  ".$username."\n";
    error_log($log, 3, self::USER_ERROR_DIR);
    }
  /*
   General Errors...
  */
    public static function general($msg)
    {
    $date = date('d.m.Y h:i:s');
    $log = $msg."   |  Date:  ".$date."\n";
    error_log($msg."   |  Date:  ".$date, 3, self::GENERAL_ERROR_DIR);
    }

} // end Log


?>