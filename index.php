<?php 


require( "config.php" );
session_start();
$page = isset( $_GET['page'] ) ? $_GET['page'] : "home";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";


/*if(isset($_SESSION["type"]) && $_SESSION["type"] != "User"){	
	header("location: index.php?page=home");exit();
}*/


if ( $page != "login" && $page != "logout" && !$username && $page != "signup" && $page != "home" && $page != "contactus" && $page != "aboutus" && $page != "abouttheteam" && $page != "listofsport" && $page != "faq" && $page != "search" && $page != "infra" && $page != "infradetails" && $page != "trainerdetails" && $page != "events" && $page != "eventdetails" && $page != "concept" && $page != 'launch') {
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
	case 'events':
	  events();
	  break;
	case 'eventdetails':
	  eventdetails();
	  break;
	case 'infradetails':
	  infradetails();
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
			$sql = "SELECT * FROM trainer_charges LEFT JOIN trainer_details ON trainer_details.uid = trainer_charges.uid LEFT JOIN user_profilepic ON user_profilepic.uid = trainer_charges.uid LEFT JOIN users ON users.randomid = trainer_charges.uid WHERE users.type = 'Trainer' AND trainer_details.sports LIKE'%".$_GET['sport']."%' AND trainer_details.type = '".$_GET['type']."' AND trainer_details.city = '".$_GET['city']."' ORDER BY users.id DESC LIMIT $start,$limit";
			$response = getallarray($sql);
	
			$sql2 = "SELECT * FROM trainer_charges LEFT JOIN trainer_details ON trainer_details.uid = trainer_charges.uid LEFT JOIN user_profilepic ON user_profilepic.uid = trainer_charges.uid LEFT JOIN users ON users.randomid = trainer_charges.uid WHERE users.type = 'Trainer' AND trainer_details.sports LIKE'%".$_GET['sport']."%' AND trainer_details.type = '".$_GET['type']."' AND trainer_details.city = '".$_GET['city']."' ORDER BY users.id DESC";
			$data = getpagination($sql2);
			$results['totalRows'] = $data['total_pages']; 
			$results['next'] = $data['next'];
			$results['prev'] = $data['prev'];
			$results['total_pages'] = $data['total_pages'];
			$results['count'] = $count;
			$sql3 = "SELECT DISTINCT city FROM trainer_details";
			$response3 = getallarray($sql3);
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
	$results = array();	
	$result['redirect_to'] = "index.php?page=trainerdetails&id=".$_GET['id'];
	include("getdata.php");
	include("savedata.php");
	include("getpagination.php");
	$sql = "SELECT * FROM users LEFT JOIN user_profilepic ON user_profilepic.uid = users.randomid LEFT JOIN trainer_details ON trainer_details.uid = users.randomid LEFT JOIN trainer_charges ON trainer_charges.uid = users.randomid LEFT JOIN trainer_images ON trainer_images.uid = users.randomid WHERE users.randomid = '".$_GET['id']."'";
	$response = getall($sql);
	if(isset($_SESSION['uid']))
	{
	$sql2 = "SELECT * FROM trainer_enquiries WHERE enquiry_for = '".$_GET['id']."' AND enquiry_by = '".$_SESSION['uid']."'";
	$results = getpagination($sql2);
	$results['booked'] = $results['total_records'];
	}
	
	
	include(TEMPLATE_PATH."trainerdetails.php");
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
    
  
			include("getarraydata.php");
	$sql = "SELECT DISTINCT city FROM trainer_details";
	$response = getallarray($sql);
	$sql2 = "SELECT DISTINCT city FROM infra_sports";
	$response2 = getallarray($sql2);
	$sql3 = "SELECT DISTINCT city FROM events";
	$response3 = getallarray($sql3);
	include(TEMPLATE_PATH."index.php");			
    
	

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
			$sql = "SELECT * FROM infra_sports LEFT JOIN infra_images ON infra_images.ground_uid = infra_sports.ground_uid LEFT JOIN infra_details ON infra_details.randomid = infra_sports.uid LEFT JOIN users ON users.randomid = infra_sports.uid WHERE infra_sports.sport = '".$_GET['sport']."' AND infra_sports.city = '".$_GET['city']."' ORDER BY infra_sports.id DESC LIMIT $start,$limit";

			$response = getallarray($sql);
			$sql2 = "SELECT * FROM infra_sports LEFT JOIN infra_images ON infra_images.ground_uid = infra_sports.ground_uid LEFT JOIN infra_details ON infra_details.randomid = infra_sports.uid LEFT JOIN users ON users.randomid = infra_sports.uid WHERE infra_sports.sport = '".$_GET['sport']."' AND infra_sports.city = '".$_GET['city']."' ORDER BY infra_sports.id DESC";
			$data = getpagination($sql2);
			$results['totalRows'] = $data['total_pages']; 
			$results['next'] = $data['next'];
			$results['prev'] = $data['prev'];
			$results['total_pages'] = $data['total_pages'];
			$results['count'] = $count;
			$sql2 = "SELECT DISTINCT city FROM infra_sports";
			$response2 = getallarray($sql2);
	}
	else
	{
	include("getarraydata.php");
	include("getpagination.php");
//	$table = "cricketform_info JOIN users ON users.randomid = cricketform_info.uid";
//	$response =  singletable_all( $table, $where = "", $param = "*" );	
	$sql = "SELECT * FROM users LEFT JOIN user_profilepic ON user_profilepic.uid = users.randomid LEFT JOIN infra_details ON infra_details.randomid = users.randomid WHERE users.type = 'Infra'  ORDER BY users.id DESC LIMIT $start,$limit";
	$response = getallarray($sql);
	$sql2 = "SELECT * FROM users LEFT JOIN user_profilepic ON user_profilepic.uid = users.randomid LEFT JOIN infra_details ON infra_details.randomid = users.randomid WHERE users.type = 'Infra' ORDER BY users.id DESC";
	$data = getpagination($sql2);
	$results['totalRows'] = $data['total_pages']; 
	$results['next'] = $data['next'];
	$results['prev'] = $data['prev'];
	$results['total_pages'] = $data['total_pages'];
	$results['count'] = $count;
	}
	include(TEMPLATE_PATH."infra_search.php");
}

function infradetails(){
	
	if(!isset($_GET['id']) || !$_GET['id'])
	{
		header("index.php?page=home");
		exit;
	}
	if(isset($_GET['sport']))
	{	$result['redirect_to'] = "index.php?page=infradetails&id=".$_GET['id']."&sport=".$_GET['sport'];
		include("getdata.php");
	    include("getarraydata.php");
		include("getpagination.php");
		include("savedata.php");
		$results = array();
		//Get a single row data related to the infrastructure
		$sql = "SELECT * FROM infra_sports LEFT JOIN infra_details ON infra_details.randomid = infra_sports.uid LEFT JOIN infra_images ON infra_images.ground_uid = infra_sports.ground_uid LEFT JOIN infra_timings ON infra_timings.ground_uid = infra_sports.ground_uid LEFT JOIN users ON users.randomid = infra_sports.uid LEFT JOIN user_profilepic ON user_profilepic.uid = infra_sports.uid WHERE users.type = 'Infra' AND infra_sports.ground_uid = '".$_GET['id']."'";
		
		$response = getall($sql);
		//Get all the column names from the table
		/*$sql2 = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'".$_GET['sport']."form_info'";
		$response2 = getallarray($sql2);*/
		$sql2 = "SELECT * FROM infra_sports WHERE ground_uid = '".$_GET['id']."'";
		$response2 = getall($sql2);
		$sql4 = "SELECT * FROM infra_mapping WHERE sport = '".$_GET['sport']."'";
		$response4 = getall($sql4);
		if(isset($_SESSION['uid']))
		{
			$sql3 = "SELECT * FROM infra_enquiries WHERE enquiry_for = '".$response['uid']."' AND enquiry_by = '".$_SESSION['uid']."'";
			$results = getpagination($sql3);
			$results['booked'] = $results['total_records'];
		}
	}
	include(TEMPLATE_PATH."infradetails.php");
}

function events(){
	
	$limit = 12;
$count = isset($_GET['count']) ? $_GET['count'] : 1;
$start = ($count - 1) * $limit;
	$results = array();
	if(isset($_GET['sport']) || isset($_GET['city']) || isset($_GET['date']))
	{
			include("getarraydata.php");
			include("getpagination.php");
		//	$table = "cricketform_info JOIN users ON users.randomid = cricketform_info.uid";
		//	$response =  singletable_all( $table, $where = "", $param = "*" );	
			$sql = "SELECT * FROM events LEFT JOIN events_schedule ON events_schedule.event_id = events.event_id WHERE events.sports LIKE'%".$_GET['sport']."%' AND events.city = '".$_GET['city']."' AND events_schedule.registration_start_date = '".$_GET['date']."' ORDER BY events.id DESC LIMIT $start,$limit";

			$response = getallarray($sql);
			if(empty($response))
			{
				
				$datemonth = date('F',strtotime($_GET['date']));
				$sql = "SELECT * FROM events LEFT JOIN events_schedule ON events_schedule.event_id = events.event_id WHERE events.sports LIKE'%".$_GET['sport']."%' AND events.city = '".$_GET['city']."' AND monthname(registration_start_date) = '".$datemonth."' ORDER BY events.id DESC LIMIT $start,$limit";
				$response = getallarray($sql);
				$sql2 = "SELECT * FROM events LEFT JOIN events_schedule ON events_schedule.event_id = events.event_id WHERE events.sports LIKE'%".$_GET['sport']."%' AND events.city = '".$_GET['city']."' AND monthname(registration_start_date) = '".$datemonth."' ORDER BY events.id DESC";
				$data = getpagination($sql2);
				$results['totalRows'] = $data['total_pages']; 
				$results['next'] = $data['next'];
				$results['prev'] = $data['prev'];
				$results['total_pages'] = $data['total_pages'];
				$results['count'] = $count;
				$sql2 = "SELECT DISTINCT city FROM events";
				$response2 = getallarray($sql2);
			}
			else
			{
			$sql2 = "SELECT * FROM events LEFT JOIN events_schedule ON events_schedule.event_id = events.event_id WHERE events.sports LIKE'%".$_GET['sport']."%' AND events.city = '".$_GET['city']."' AND events_schedule.registration_start_date = '".$_GET['date']."' ORDER BY events.id DESC";
			$data = getpagination($sql2);
			$results['totalRows'] = $data['total_pages']; 
			$results['next'] = $data['next'];
			$results['prev'] = $data['prev'];
			$results['total_pages'] = $data['total_pages'];
			$results['count'] = $count;
			$sql2 = "SELECT DISTINCT city FROM events";
			$response2 = getallarray($sql2);
			}
	}
	include(TEMPLATE_PATH."events_search.php");
}

function eventdetails(){
	
	if(!isset($_GET['id']) || !$_GET['id'])
	{
		header("index.php?page=home");
		exit;
	}
	include('getdata.php');
	include('getpagination.php');
	$result['redirect_to'] = "index.php?page=eventdetails&id=".$_GET['id'];
	$sql = "SELECT * FROM events LEFT JOIN events_schedule ON events_schedule.event_id = events.event_id LEFT JOIN user_profilepic ON user_profilepic.uid = events.uid LEFT JOIN users ON users.randomid = events.uid WHERE events.event_id = '".$_GET['id']."'";
	$response = getall($sql);
	$sports = explode(",",$response['sports']);
	if(isset($_SESSION['uid']))
	{
	$sql2 = "SELECT * FROM event_enquiries WHERE enquiry_for = '".$response['uid']."' AND enquiry_by = '".$_SESSION['uid']."'";
	$results = getpagination($sql2);
	$results['booked'] = $results['total_records'];
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		include('savedata.php');
	}
	include(TEMPLATE_PATH."eventdetails.php");
}

function logout()
{
	session_destroy();
	login();
}

function login()
{
	$result["redirect_to"] = "home";
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