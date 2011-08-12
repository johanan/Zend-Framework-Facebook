<?php
/*
 * You just need to require the facebook file from Facebook's SDK
 */
require('.\library\Facebook\facebook.php');

class Non_Zend_Facebook 
{
	private static $fb;
	
	private static function getFB()
	{
		if(self::$fb)
		{
			return self::$fb;
		}
		
		$fb = New Facebook_Facebook(array(
				'appId' => 'APP_ID',
				'secret' => 'APP_SECRET',
				));
		
		self::$fb = $fb;
		
		return self::$fb;
	}
	
	public static function __callStatic ( $name, $args ) 
	{

        $callback = array ( self::getFB(), $name ) ;
        return call_user_func_array ( $callback , $args ) ;
    }
}
?>
