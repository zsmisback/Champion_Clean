<?php 


require( "config.php" );
session_start();
$page = isset( $_GET['page'] ) ? $_GET['page'] : "home";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";


if(isset($_SESSION["type"]) && $_SESSION["type"] != "User"){	
	header("location: /sport/infra/?page=home");exit();
}


if ( $page != "login" && $page != "logout" && !$username && $page != "signup" && $page != "home" && $page != "contactus" && $page != "aboutus" && $page != "faq" && $page != "search" && $page != "concept" && $page != 'launch') {
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
	case 'contactus':	
	  contactus();
	  break;        
	case 'faq':
	   faq();
	  break;   
    case 'login':	
	  login();	 
      break;
	case 'signup':   
     signup();	 
      break;
	case 'dashboard':	
	  dashboard();
	  break;
	case 'logout':	
	  logout();
	  break;  
	case 'search':
	  search();
	  break; 
	case 'concept':
	  concept();
	  break; 
	  
	default:
	  mainpage();		
}


function search(){	
	include("getdata_all.php");
	
//	$table = "cricketform_info JOIN users ON users.randomid = cricketform_info.uid";
//	$response =  singletable_all( $table, $where = "", $param = "*" );	
	
	include(TEMPLATE_PATH."search.php");			
	
}

	
	function limitstring($string){
	// strip tags to avoid breaking any html
	$string = strip_tags($string);
	if (strlen($string) > 300) {

		// truncate string
		$stringCut = substr($string, 0, 300);
		$endPoint = strrpos($stringCut, ' ');

		//if the string doesn't contain any space then it will cut without word basis.
		$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
		return $string .= '... ';
	}
		return $string;
	}



function concept(){
	include(TEMPLATE_PATH."howitworks.php");			
}

function aboutus(){
	include(TEMPLATE_PATH."aboutus.php");			
}

function contactus(){
	include(TEMPLATE_PATH."contactus.php");			
}

function faq(){
	include(TEMPLATE_PATH."faq.php");			
}

function home(){
    
    $currentTime = time();
    if (($currentTime > strtotime('18:00:00')) && ($currentTime < strtotime('19:05:00'))){
        // whatever you have to do here
       	include("launch.html");			
    }
    else{
	include(TEMPLATE_PATH."index.php");			
    }
}

function logout()
{
	session_destroy();
	login();
}

function login()
{
	$result["redirect_to"] = "dashboard";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include("getdata_single.php");
		$response = singletable( "users", $where = "WHERE type = 'Trainer' AND username='".$_POST['users|username']."' AND password ='".$_POST['users|password']."'", $param = "*" );	
		
		if(!isset($response["error"])){
			session_start();		
			$_SESSION["username"] = $response['users|username'];
			$_SESSION["type"] = $response['users|type'];
			$_SESSION["name"] = $response['users|name'];
			$_SESSION["uid"] = $response['users|randomid'];
			
			header("Location:?page=".$result["redirect_to"]);}
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

function mainpage()
{
	include(TEMPLATE_PATH."index.php");
}

////LIST OF GENERAL FUNCTION


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>