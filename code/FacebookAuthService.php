<?php

class FacebookAuthService extends RestfulService {
	
	/**
    * API Key
    * 
    **/
	protected static $key = '';
	
	/**
    * API Secret
    * 
    **/
	protected static $secret = '';
	
	/**
    * AuthToken
    * 
    **/
	protected static $token = '';
	
	/**
    * Get the API Key
    *
    * @return string API Key
    **/
	public static function getAPIKey(){
		return self::$key;
	}
	
	/**
    * Get the API Secret
    *
    * @return string API Secret
    **/
	public static function getAPISecret(){
		return self::$secret;
	}
	
	/**
    * Set the API Credentials
    *
    * @param string $api_key   API Key
    * @param string $api_secret API Secret
    */   
	public static function setAPICredentials($api_key, $api_secret){
	 	self::$key = $api_key;
	 	self::$secret = $api_secret;
 	}
 	
 	public static function setAuthToken($token){
	 	self::$token = $token;
 	}
 	
 	public static function getAuthToken(){
		return self::$token;
	}
 	
 	
    function __construct($base='',$expiry=0,$grant_type="client_credentials",$redirect_url="http://fatapp.emelle.me/signup/"){
		//Check session for AppToken

			//Step 1: Get Code. Code set in session
			/*$codeurl = "https://www.facebook.com/dialog/oauth?client_id=".self::getAPIKey()."&redirect_uri=".urlencode("http://dan.phillypolice.com/canvas/facebook/")."&scope=manage_pages";
			$r = new RestfulService($codeurl);
			$rep = $r->request(); */
			//var_dump(Session::get('FBCode'));
			//exit;
		
			//Step 2: Get App Access Token Using Code Retrieved in step 1
			/*if(!$fb){
				user_error("Please visit www.facebook.com/dialog/oauth?client_id=266568870025731&redirect_uri=http://fatapp.emelle.me/signup/&scope=manage_pages,offline_access to get the authtoken", E_USER_ERROR);
			}else{ */
				
					$authlink = "https://graph.facebook.com/oauth/access_token?client_id=".self::getAPIKey()."&type=user_agent&client_secret=".self::getAPISecret()."&redirect_uri=http://fatapp.emelle.me/signup/&code=".Session::get('FBCode');
					$response = file_get_contents($authlink);
     				$params = null;
     				parse_str($response, $params);
     				$token = $params['access_token'];
     				var_dump($response);
     				exit;
					Session::set('AuthToken',$token);
					$this->setAuthToken($token);
				
			//}
    	//Step 3: 
        parent::__construct($base, $expiry);
        $this->checkErrors = true;
    }
    
    public function getAppToken(){
    	$req = Session::get('AppToken');
    	return $req;
    }
    
}
