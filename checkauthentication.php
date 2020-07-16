<?php 

function authenticate($joined_string, $post)
{
			if(strpos($joined_string, "email") !== false){							
				if (!filter_var($post[$joined_string], FILTER_VALIDATE_EMAIL)){
					return "Please check the email address entered.";
				}			
				if(empty($post[$joined_string])){return "Enter the values marked with star.";}
			}
			if (strpos($joined_string, 'contact_no') !== false) 
			{				
				if (!preg_match('/^[0-9]{10}+$/', $post[$joined_string])) {									
				 return "Please check the contact number you have entered.";
				}
				if(empty($post[$joined_string])){return "Enter the values marked with star.";}
			}				
			if(strpos($joined_string, 'name') !== false) 
			{
				if(empty($post[$joined_string])){return "Enter the values marked with star.";}
			}			
			if(strpos($joined_string, 'password') !== false) 
			{
				if (strlen($post[$joined_string]) < 5) {
						return "Your Password Must Contain At Least 5 Characters!";
					}
				if(empty($post[$joined_string])){return "Enter the values marked with star.";}
							
			///////////////////////////////////////////////////////////////////////////////////	
				if(isset($post["vpassword"]))
				{
					if($post["vpassword"] != $post[$joined_string])
					{
						return "Password don't match";
					}
					if(empty($post["vpassword"])){return "Enter the values marked with star.";}
				}
				
			}
				

			if(strpos($joined_string, 'trainers_id') !== false) 
			{
				if($joined_string != $_SESSION["trainer_id"])
				{
					return "Error ! You session doesn't match. Login In Again.";
				}
				if(empty($post[$joined_string])){return "Enter the values marked with star.";}
			}				
			
			if(strpos($joined_string, 'service_hourly') !== false) 
			{
				if(empty($post[$joined_string])){return "Enter the values marked with star.";}
			}	
			if(strpos($joined_string, 'service_daily') !== false) 
			{
				if(empty($post[$joined_string])){return "Enter the values marked with star.";}
			}	
			
			return "true";
}			

?>