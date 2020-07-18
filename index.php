<?php 


require( "config.php" );
session_start();
$page = isset( $_GET['page'] ) ? $_GET['page'] : "home";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";


/*if(isset($_SESSION["type"]) && $_SESSION["type"] != "User"){	
	header("location: index.php?page=home");exit();
}*/


if ( $page != "login" && $page != "logout" && !$username && $page != "signup" && $page != "home" && $page != "contactus" && $page != "aboutus" && $page != "abouttheteam" && $page != "listofsport" && $page != "faq" && $page != "search" && $page != "infra" && $page != "trainerdetails" && $page != "concept" && $page != 'launch') {
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
	case 'search':
	  search();
	  break; 
	case 'infra':
	  infra();
	  break;
	case 'trainerdetails':
	  trainerdetails();
	  break;
	case 'concept':
	  concept();
	  break; 
	  
	default:
	  mainpage();		
}


function search(){	

$limit = 12;
$count = isset($_GET['count']) ? $_GET['count'] : 1;
$start = ($count - 1) * $limit;
	$results = array();
	if(isset($_GET['sport']) || isset($_GET['type']) || isset($_GET['city']))
	{
			include("getarraydata.php");
			include("getpagination.php");
		//	$table = "cricketform_info JOIN users ON users.randomid = cricketform_info.uid";
		//	$response =  singletable_all( $table, $where = "", $param = "*" );	
			$sql = "SELECT * FROM users LEFT JOIN user_profilepic ON user_profilepic.uid = users.randomid LEFT JOIN trainer_details ON trainer_details.uid = users.randomid LEFT JOIN trainer_charges ON trainer_charges.uid = users.randomid WHERE users.type = 'Trainer' AND trainer_details.sports LIKE'%".$_GET['sport']."%' AND trainer_details.type = '".$_GET['type']."' AND trainer_details.city = '".$_GET['city']."' LIMIT $start,$limit";
			$response = getallarray($sql);
	
			$sql2 = "SELECT * FROM users LEFT JOIN user_profilepic ON user_profilepic.uid = users.randomid LEFT JOIN trainer_details ON trainer_details.uid = users.randomid LEFT JOIN trainer_charges ON trainer_charges.uid = users.randomid WHERE users.type = 'Trainer' AND trainer_details.sports LIKE'%".$_GET['sport']."%' AND trainer_details.type = '".$_GET['type']."' AND trainer_details.city = '".$_GET['city']."'";
			$data = getpagination($sql2);
			$results['totalRows'] = $data['total_pages']; 
			$results['next'] = $data['next'];
			$results['prev'] = $data['prev'];
			$results['total_pages'] = $data['total_pages'];
			$results['count'] = $count;
	}
	else
	{
	include("getarraydata.php");
	include("getpagination.php");
//	$table = "cricketform_info JOIN users ON users.randomid = cricketform_info.uid";
//	$response =  singletable_all( $table, $where = "", $param = "*" );	
	$sql = "SELECT * FROM users LEFT JOIN user_profilepic ON user_profilepic.uid = users.randomid LEFT JOIN trainer_details ON trainer_details.uid = users.randomid LEFT JOIN trainer_charges ON trainer_charges.uid = users.randomid WHERE users.type = 'Trainer' LIMIT $start,$limit";
	$response = getallarray($sql);
	$sql2 = "SELECT * FROM users LEFT JOIN user_profilepic ON user_profilepic.uid = users.randomid LEFT JOIN trainer_details ON trainer_details.uid = users.randomid LEFT JOIN trainer_charges ON trainer_charges.uid = users.randomid WHERE users.type = 'Trainer'";
	$data = getpagination($sql2);
	$results['totalRows'] = $data['total_pages']; 
	$results['next'] = $data['next'];
	$results['prev'] = $data['prev'];
	$results['total_pages'] = $data['total_pages'];
	$results['count'] = $count;
	}
	include(TEMPLATE_PATH."search.php");			
	
}

function trainerdetails(){
	
	if(!isset($_GET['id']) || !$_GET['id'])
	{
		header("index.php?page=home");
		exit;
	}
	include("getdata.php");
	$sql = "SELECT * FROM users LEFT JOIN user_profilepic ON user_profilepic.uid = users.randomid LEFT JOIN trainer_details ON trainer_details.uid = users.randomid LEFT JOIN trainer_charges ON trainer_charges.uid = users.randomid LEFT JOIN trainer_images ON trainer_images.uid = users.randomid WHERE users.randomid = '".$_GET['id']."'";
	$response = getall($sql);
	include(TEMPLATE_PATH."trainer_details.php");
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

function abouttheteam(){
	include(TEMPLATE_PATH."abouttheteam.php");
}

function listofsport(){
	include(TEMPLATE_PATH."listofsport.php");
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
			include("getarraydata.php");
	$sql = "SELECT DISTINCT city FROM trainer_details";
	$response = getallarray($sql);
	$sql2 = "SELECT DISTINCT city FROM infra_details";
	$response2 = getallarray($sql2);
	include(TEMPLATE_PATH."index.php");			
    }
	

}

function infra(){
	
	$limit = 12;
$count = isset($_GET['count']) ? $_GET['count'] : 1;
$start = ($count - 1) * $limit;
	$results = array();
	if(isset($_GET['sport']) || isset($_GET['city']))
	{
			include("getarraydata.php");
			include("getpagination.php");
		//	$table = "cricketform_info JOIN users ON users.randomid = cricketform_info.uid";
		//	$response =  singletable_all( $table, $where = "", $param = "*" );	
			$sql = "SELECT * FROM users LEFT JOIN user_profilepic ON user_profilepic.uid = users.randomid LEFT JOIN infra_details ON infra_details.randomid = users.randomid LEFT JOIN trainer_charges ON trainer_charges.uid = users.randomid WHERE users.type = 'Trainer' AND trainer_details.sports LIKE'%".$_GET['sport']."%' AND trainer_details.type = '".$_GET['type']."' AND trainer_details.city = '".$_GET['city']."' LIMIT $start,$limit";
			$response = getallarray($sql);
	
			$sql2 = "SELECT * FROM users LEFT JOIN user_profilepic ON user_profilepic.uid = users.randomid LEFT JOIN infra_details ON infra_details.randomid = users.randomid LEFT JOIN trainer_charges ON trainer_charges.uid = users.randomid WHERE users.type = 'Trainer' AND trainer_details.sports LIKE'%".$_GET['sport']."%' AND trainer_details.type = '".$_GET['type']."' AND trainer_details.city = '".$_GET['city']."'";
			$data = getpagination($sql2);
			$results['totalRows'] = $data['total_pages']; 
			$results['next'] = $data['next'];
			$results['prev'] = $data['prev'];
			$results['total_pages'] = $data['total_pages'];
			$results['count'] = $count;
	}
	else
	{
	include("getarraydata.php");
	include("getpagination.php");
//	$table = "cricketform_info JOIN users ON users.randomid = cricketform_info.uid";
//	$response =  singletable_all( $table, $where = "", $param = "*" );	
	$sql = "SELECT * FROM users LEFT JOIN user_profilepic ON user_profilepic.uid = users.randomid LEFT JOIN trainer_details ON trainer_details.uid = users.randomid LEFT JOIN trainer_charges ON trainer_charges.uid = users.randomid WHERE users.type = 'Trainer' LIMIT $start,$limit";
	$response = getallarray($sql);
	$sql2 = "SELECT * FROM users LEFT JOIN user_profilepic ON user_profilepic.uid = users.randomid LEFT JOIN trainer_details ON trainer_details.uid = users.randomid LEFT JOIN trainer_charges ON trainer_charges.uid = users.randomid WHERE users.type = 'Trainer'";
	$data = getpagination($sql2);
	$results['totalRows'] = $data['total_pages']; 
	$results['next'] = $data['next'];
	$results['prev'] = $data['prev'];
	$results['total_pages'] = $data['total_pages'];
	$results['count'] = $count;
	}
	include(TEMPLATE_PATH."infra_search.php");
}

function logout()
{
	session_destroy();
	login();
}

function login()
{
	$result["redirect_to"] = "home";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include("getdata_single.php");
		$response = singletable( "users", $where = "WHERE type = 'User' AND username='".$_POST['users|username']."' AND password ='".$_POST['users|password']."'", $param = "*" );	
		
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