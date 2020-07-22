<?php 


require( "config.php" );
session_start();
$page = isset( $_GET['page'] ) ? $_GET['page'] : "home";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";




if(isset($_SESSION["type"]) && $_SESSION["type"] != "Infra"){	
	header("location:index.php?page=home");exit();
}

if ( $page != "login" && $page != "logout" && !$username && $page != "signup" && $page != "home" && $page != "contactus" && $page != "queries" && $page != "aboutus" && $page != "abouttheteam" && $page != "listofsport" && $page != "faq" && $page != "concept") {
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
    case 'login':	
	  login();	 
      break;
	case 'signup':   
      signup();	 
      break;
	case 'queries':
	  queries();
	  break;
	case 'editprofile':
	   editprofile();
	   break;
	case 'editpassword':
	   editpassword();
	   break;   
	case 'editdetails':
	   editdetails();
	   break;  
	case 'dashboard':	
	  dashboard();
	  break;
	case 'faq':
	   faq();
	  break; 
	case 'concept':
	   concept();
	  break;   
	case 'logout':	
	  logout();
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
	include(TEMPLATE_PATH_INFRA."home.php");			
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
		$response = singletable( "users", $where = "WHERE type = 'Infra' AND username='".$_POST['users|username']."' AND password ='".$_POST['users|password']."'", $param = "*" );	
		
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

function queries(){
	
	if(!isset($_SESSION["uid"]))
	{
		header("Location:trainer.php?page=home");
		exit;
	}
	$results = array();
	include 'getpagination.php';
	$sql = "SELECT * FROM infra_enquiries WHERE enquiry_for = '".$_SESSION['uid']."'";
	$response = getpagination($sql);
	$results['post'] = $response['post'];
	include(TEMPLATE_PATH_INFRA."query.php");
}

//Edit Infrastructure Registration Form
function editprofile(){
	
	if(!isset($_SESSION["uid"]))
	{
		header("Location:infra.php?page=home");
		exit;
	}
	elseif($_SESSION["type"] !== "Infra")
	{
		header("Location:infra.php?page=home");
		exit;
	}
	include 'getdata.php';
	$sql = "SELECT * FROM users WHERE users.randomid = '".$_SESSION['uid']."'";
	$response = getall($sql);
	include(TEMPLATE_PATH_INFRA."editsignup.php");

}

//Edit Infrastructure Password
function editpassword(){
	
	if(!isset($_SESSION["uid"]))
	{
		header("Location:infra.php?page=home");
		exit;
	}
	elseif($_SESSION["type"] !== "Infra")
	{
		header("Location:infra.php?page=home");
		exit;
	}

	include(TEMPLATE_PATH_INFRA."editpassword.php");

}

//Edit Infrastructure Details Form
function editdetails(){
	
	if(!isset($_SESSION["uid"]))
	{
		header("Location:infra.php?page=home");
		exit;
	}
	elseif($_SESSION["type"] !== "Infra")
	{
		header("Location:infra.php?page=home");
		exit;
	}
	include 'getdata.php';
	//Check if the Infrastructure has filled the Details Registration Form
	$sql = "SELECT * FROM infra_details WHERE randomid = '".$_SESSION['uid']."'";
	$check = getall($sql);
	if(empty($check))
	{
		header("Location:infra.php?page=dashboard");
		exit;
	}
	//Get the trainers current details from infra_details and the user_profilepic table
	$sql2 = "SELECT * FROM infra_details LEFT JOIN user_profilepic ON user_profilepic.uid = infra_details.randomid WHERE infra_details.randomid = '".$_SESSION['uid']."'";
	$response = getall($sql2);
	include(TEMPLATE_PATH_INFRA."editdetails.php");
}

function dashboard()
{	
	$checkflag = 0; 
	 
	include("getdata_single.php");
	$response = singletable( "infra_details", $where = "WHERE randomid='".$_SESSION['uid']."'", $param = "*" );	
		
	if(isset($response["error"])){$checkflag = 1;}	
	else{		
		$response["infra_details|sports"] = explode(",",$response["infra_details|sports"]);
		
		foreach($response["infra_details|sports"] as $sportground){		
		$tablename = $sportground."form_info";
		$sporttableresponse = singletable( $tablename, $where = "WHERE uid='".$_SESSION['uid']."'", $param = "*");					
		if(isset($sporttableresponse["error"])){$checkflag = $sportground;break;}
		}
	}
	
	
	if($checkflag == 1){
		$result["redirect_to"] = "?page=login";
		
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				include("savedata.php");
			}	
			
		include(TEMPLATE_PATH_INFRA."details.php");
	}	
	else if(strcmp($checkflag, "cricket") == 0){		
		$random_ground = generateRandomString()."_cricket";
		$result["redirect_to"] = "?page=login";
		
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				include("savedata.php");
			}	
		
		include(TEMPLATE_PATH_INFRA."cricketdetails.php");
	}
	else if(strcmp($checkflag, "football") == 0){		
		$random_ground = generateRandomString()."_football";
		$result["redirect_to"] = "?page=login";
		
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				include("savedata.php");
			}	
		
		include(TEMPLATE_PATH_INFRA."footballdetails.php");
	}	
	else if(strcmp($checkflag, "basketball") == 0){		
		$random_ground = generateRandomString()."_basketball";
		$result["redirect_to"] = "?page=login";
		
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				include("savedata.php");
			}	
		
		include(TEMPLATE_PATH_INFRA."basketballdetails.php");
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