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
    case 'addinfra':
	   addinfra();
	   break;
	case 'infra':
	   infra();
	   break;
	case 'editinfra':
	   editinfra();
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
	$response = '';
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include("getdata.php");
		$sql = "SELECT * FROM users WHERE type = 'Infra' AND username ='".$_POST['users|username']."'";
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
	
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
		$result["redirect_to"] = "infra.php?page=home";
		
		include("updatedata.php");
		
		}
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
	
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
		$result["redirect_to"] = "infra.php?page=home";
		
		include("updatedata.php");
		
		}
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
	
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
		$result["redirect_to"] = "infra.php?page=dashboard";
		
		include("updatedata.php");
		
		}
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
	//Get the infras current details from infra_details and the user_profilepic table
	$sql2 = "SELECT * FROM infra_details LEFT JOIN user_profilepic ON user_profilepic.uid = infra_details.randomid WHERE infra_details.randomid = '".$_SESSION['uid']."'";
	$response = getall($sql2);
	$profilepic = explode("/",$response['profilepic']);
	include(TEMPLATE_PATH_INFRA."editdetails.php");
}

function addinfra(){
	
	//Check if the user has filled in the infra_details form
	$sql = "SELECT * FROM infra_details WHERE randomid = '".$_SESSION['uid']."'";
	include 'getdata.php';
	$check = getall($sql);
	//If not,send the person to the dashboard aka the infra_details form
	if(empty($check))
	{
		header("Location:infra.php?page=dashboard");
		exit;
	}
	//Get the sports column from the infra_details table and turn it into an array
	$sports = explode(",",$check['sports']);

	
	if(isset($_GET['sport']))
	{
		
	
		if($_GET['sport'] == 'cricket')
		{
			$random_ground = generateRandomString()."_cricket";
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				
				$result["redirect_to"] = "?page=login";
				include 'updatedata.php'; 
				
			}
			include(TEMPLATE_PATH_INFRA."cricketdetails.php");
		}
		if($_GET['sport'] == 'football')
		{
			$random_ground = generateRandomString()."_football";
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				
				$result["redirect_to"] = "?page=login";
				include 'updatedata.php'; 
				
			}
			include(TEMPLATE_PATH_INFRA."footballdetails.php");
		}
		if($_GET['sport'] == 'basketball')
		{
			$random_ground = generateRandomString()."_basketball";
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				
				$result["redirect_to"] = "?page=login";
				include 'updatedata.php'; 
				
			}
			include(TEMPLATE_PATH_INFRA."basketballdetails.php");
		}
		if($_GET['sport'] == 'kickboxing')
		{
			$random_ground = generateRandomString()."_kickboxing";
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				
				$result["redirect_to"] = "?page=login";
				include 'updatedata.php'; 
				
			}
			include(TEMPLATE_PATH_INFRA."kickboxingdetails.php");
		}
		if($_GET['sport'] == 'rifleshooting')
		{
			$random_ground = generateRandomString()."_rifleshooting";
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				
				$result["redirect_to"] = "?page=login";
				include 'updatedata.php'; 
				
			}
			include(TEMPLATE_PATH_INFRA."rifleshootingdetails.php");
		}
	}
	else
	{		
		include(TEMPLATE_PATH_INFRA."addinfra.php");
	}
	
	
}

function infra(){
	
	if(!isset($_GET['sports']) || !$_GET['sports'])
	{
		header("Location:infra.php?page=home");
		exit;
	}
	include 'getarraydata.php';
	$sql = "SELECT * FROM ".$_GET['sports']."form_info WHERE uid = '".$_SESSION['uid']."'";
	$response = getallarray($sql);
	include(TEMPLATE_PATH_INFRA."editinfratest.php");
}

function editinfra(){
	

  	if(!isset($_GET['sports']) || !$_GET['sports'] && !isset($_GET['id']) || !$_GET['id'])
	{
		header("Location:infra.php?page=home");
		exit;
	}
	else
	{
		//Get all the data related to the ground form the user wants to edit 
		$sql = "SELECT * FROM ".$_GET['sports']."form_info LEFT JOIN infra_images ON infra_images.ground_uid = ".$_GET['sports']."form_info.ground_uid LEFT JOIN infra_timings ON infra_timings.ground_uid = ".$_GET['sports']."form_info.ground_uid WHERE ".$_GET['sports']."form_info.ground_uid = '".$_GET['id']."'";
		include 'getdata.php';
		$response  = getall($sql);
		//If the retrieved data's uid column does not match the $_SESSION['uid'] value then throw the user to the infra home page
		if($response['uid'] !== $_SESSION['uid'])
		{
			header("Location:infra.php?page=home");
			exit;
		}
		//Explode image1,image2,image3 to retrieve the folder name from the folder path stored in the sql column
		$image1 = explode("/",$response['image1']);
		$image2 = explode("/",$response['image2']);
		$image3 = explode("/",$response['image3']);
		
		

		if($_GET['sports'] == 'cricket')
		{
			$result["redirect_to"] = "?page=dashboard";
			
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				include 'updatedata.php';
			}
			
			include(TEMPLATE_PATH_INFRA."cricketdetails.php");
		}
		if($_GET['sports'] == 'basketball')
		{
			$result["redirect_to"] = "?page=dashboard";
			
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				include 'updatedata.php';
			}
			
			include(TEMPLATE_PATH_INFRA."basketballdetails.php");
		}
		if($_GET['sports'] == 'football')
		{
			$result["redirect_to"] = "?page=dashboard";
			
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				include 'updatedata.php';
			}
			
			include(TEMPLATE_PATH_INFRA."footballdetails.php");
		}
		if($_GET['sports'] == 'kickboxing')
		{
			$result["redirect_to"] = "?page=dashboard";
			
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				include 'updatedata.php';
			}
			
			include(TEMPLATE_PATH_INFRA."kickboxingdetails.php");
		}
		if($_GET['sports'] == 'rifleshooting')
		{
			$result["redirect_to"] = "?page=dashboard";
			
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				include 'updatedata.php';
			}
			
			include(TEMPLATE_PATH_INFRA."rifleshooting.php");
		}
	}

}

function deleteinfra(){
	
	if(!isset($_GET['sports']) || !$_GET['sports'] && !isset($_GET['id']) || !$_GET['id'])
	{
		header("Location:infra.php?page=home");
		exit;
	}
	else
	{
		$sql = "SELECT * FROM ".$_GET['sports']."form_info LEFT JOIN infra_images ON infra_images.ground_uid = ".$_GET['sports']."form_info.ground_uid LEFT JOIN infra_timings ON infra_timings.ground_uid = ".$_GET['sports']."form_info.ground_uid WHERE ".$_GET['sports']."form_info.ground_uid = '".$_GET['id']."'";
		include 'getdata.php';
		$response  = getall($sql);
		if($response['uid'] !== $_SESSION['uid'])
		{
			header("Location:infra.php?page=home");
			exit;
		}
		else
		{
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				
			}
			
			include 'deleteinfra.php';
		}
		
		
	}
}

function dashboard()
{	
	$checkflag = 0; 
	 
	include("getdata_single.php");
	$response = singletable( "infra_details", $where = "WHERE randomid='".$_SESSION['uid']."'", $param = "*" );	
		
	if(isset($response["error"])){$checkflag = 1;}	
	/*else{		
		$response["infra_details|sports"] = explode(",",$response["infra_details|sports"]);
		
		foreach($response["infra_details|sports"] as $sportground){		
		$tablename = $sportground."form_info";
		$sporttableresponse = singletable( $tablename, $where = "WHERE uid='".$_SESSION['uid']."'", $param = "*");					
		if(isset($sporttableresponse["error"])){$checkflag = $sportground;break;}
		}
	}*/
	
	
	if($checkflag == 1){
		$result["redirect_to"] = "?page=login";
		
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				include("savedata.php");
			}	
			
		include(TEMPLATE_PATH_INFRA."details.php");
	}	
	/*else if(strcmp($checkflag, "cricket") == 0){		
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
	else if(strcmp($checkflag, "kickboxing") == 0){		
		$random_ground = generateRandomString()."_kickboxing";
		$result["redirect_to"] = "?page=login";
		
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				include("savedata.php");
			}	
		
		include(TEMPLATE_PATH_INFRA."kickboxingdetails.php");
	}
	else if(strcmp($checkflag, "rifleshooting") == 0){		
		$random_ground = generateRandomString()."_rifleshooting";
		$result["redirect_to"] = "?page=login";
		
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				include("savedata.php");
			}	
		
		include(TEMPLATE_PATH_INFRA."rifleshootingdetails.php");
	}*/	
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