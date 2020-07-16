<?php
ini_set( "display_errors", true );
date_default_timezone_set( "Asia/Kolkata" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=sports" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "template/" );
define( "TEMPLATE_PATH_INFRA", "template/infra/" );
define( "TEMPLATE_PATH_TRAINER", "template/trainer/" );
define( "TEMPLATE_PATH_VENDOR", "template/vendor/" );
define( "TEMPLATE_PATH_EVENT", "template/event/" );
define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "mypass" );
//require( CLASS_PATH . "/Userrole.php" );
//require( CLASS_PATH . "/Users.php" );
//require( CLASS_PATH . "/Players.php" );

$error_mysql  = "";

/**
 * exception function
 *
 * @param [type] $exception
 * @return void
 */
function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  var_dump( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>
