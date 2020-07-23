<?php 


require( "config.php" );
session_start();
$page = isset( $_GET['page'] ) ? $_GET['page'] : "home";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

/*if(isset($_SESSION["type"]) && $_SESSION["type"] != "Infra"){	
	header("location: /sport/trainer/?page=home");exit();
}*/

if ( $page != "login" && $page != "logout" && !$username && $page != "home" && $page != "contactus" && $page != "aboutus" && $page != "abouttheteam" && $page != "listofsport" && $page != "faq" && $page != "concept") {
  login();
  exit;
}

if ( ($page == "signup"  || $page == "login") && $username ) {
  dashboard();
  exit;
}




switch ( $page ) {
	case 'home':	
	  home();
	  break;
	case 'aboutus':	
	  aboutus();
	  break; 
	case 'abouttheteam':	
	  abouttheteam();
	  break;
	case 'listofsport':	
	  listofsport();
	  break;  
	case 'contactus':	
	  contactus();
	  break;  
	case 'concept':	
	  concept();
	  break;
    case 'login':	
	  login();	 
      break;
	
	case 'dashboard':	
	  dashboard();
	  break;
	case 'thankyou':
      thankyou();
      break;	  
	 
	case 'events':	
	  events();
	  break;
	case 'faq':
	   faq();
	  break; 
	case 'logout':	
	  logout();
	  break;  
	default:
	  mainpage();		
}

function aboutus(){
	include(TEMPLATE_PATH."aboutus.php");			
}

function abouttheteam(){
	include(TEMPLATE_PATH."abouttheteam.php");
}

function listofsport(){
	include(TEMPLATE_PATH."listofsport.php");
}

function contactus(){
	
	$result["redirect_to"] = "?page=home";
	$random_id = generateRandomString();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if($_POST['vpcode'] == "champion")
		{
		 include("savedata.php");
		}
		else
		{
			$error_mysql = "Wrong Vpcode";
		}
	}
	include(TEMPLATE_PATH."contactus.php");			
}

function faq(){
	include(TEMPLATE_PATH."faq.php");			
}

function home(){
	include(TEMPLATE_PATH_EVENT."home.php");			
}

function concept(){
	
	include(TEMPLATE_PATH."howitworks.php");
}

function events(){
     
	 $random_event = generateRandomString();
	 $result["redirect_to"] = "?page=thankyou";
 	 	if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			
				include("savedata.php");
				
		}
	include(TEMPLATE_PATH_EVENT."events.php");
}

function logout()
{
	session_destroy();
	login();
}

function thankyou(){
	
	require(TEMPLATE_PATH."thankyou.php");
}

function login()
{
	$result["redirect_to"] = "events";
	$response = '';
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include("getdata.php");
		$sql = "SELECT * FROM users WHERE username ='".$_POST['users|username']."'";
		$response = getall($sql);
		if(empty($response))
		{
			$response = 'No';
		}
		else
		{
		if(password_verify($_POST['users|password'],$response['password']))
		{
			if(!isset($response["error"])){
			session_start();		
			$_SESSION["username"] = $response['username'];
			$_SESSION["type"] = $response['type'];
			$_SESSION["name"] = $response['name'];
			$_SESSION["uid"] = $response['randomid'];
			$_SESSION["contact_no"] = $response['contact_no'];
			header("Location:?page=".$result["redirect_to"]);
			}
			
		}
		else
		{
			$response = 'No';
		}
		}
	}
	include(TEMPLATE_PATH."login.php");
}

function signup()
{
	$result["redirect_to"] = "?page=login";
	$random_id = generateRandomString();
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include("savedata.php");
		
	}	
	include(TEMPLATE_PATH."signup.php");
}

	

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function mainpage()
{
	include(TEMPLATE_PATH."index.html");
}

////LIST OF GENERAL FUNCTION

?>