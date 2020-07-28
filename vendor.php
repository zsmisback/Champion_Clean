<?php 


require( "config.php" );
session_start();
$page = isset( $_GET['page'] ) ? $_GET['page'] : "home";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

if(isset($_SESSION["type"]) && $_SESSION["type"] != "Vendor"){	
	header("location:index.php?page=home");exit();
}


if ( $page != "login" && $page != "logout" && !$username && $page != "signup" && $page != "home" && $page != "contactus" && $page != "aboutus" && $page != "abouttheteam" && $page != "listofsport" && $page != "faq" && $page != "concept" ) {
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
	case 'concept':
	   concept();
	  break;   
	default:
	  mainpage();		
}

function concept(){
	include(TEMPLATE_PATH."howitworks.php");			
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
	include(TEMPLATE_PATH_VENDOR."home.php");			
}

function logout()
{
	session_destroy();
	login();
}

function login()
{
	$result["redirect_to"] = "dashboard";
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
			if($response['type'] == 'User')
				{
					header("Location:index.php?page=home");
				}
				elseif($response['type'] == 'Infra')
				{
					header("Location:infra.php?page=dashboard");
				}
				elseif($response['type'] == 'Trainer')
				{
					header("Location:trainer.php?page=dashboard");
				}
				elseif($response['type'] == 'Vendor')
				{
					header("Location:vendor.php?page=dashboard");
				}
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

function dashboard()
{	
	$checkflag = 0; 	 
	include("getdata_single.php");
	$response = singletable( "vendor_details", $where = "WHERE randomid='".$_SESSION['uid']."'", $param = "*" );	
		
	if(isset($response["error"])){$checkflag = 1;}
	

	if($checkflag == 1){
		$result["redirect_to"] = "?page=login";
		
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				include("savedata.php");
			}	
			$random_id = generateRandomString();
		include(TEMPLATE_PATH_VENDOR."vendorregistration.php");
	}	
	else{
		include(TEMPLATE_PATH."thankyou.php");
	}
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