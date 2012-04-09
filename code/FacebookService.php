<?php

class FacebookService extends RestfulService {
    
    /**
    * App Token
    * 
    **/
	protected static $apptoken = '';
	
	/**
    * Page Token
    * 
    **/
	protected static $pagetoken = '';
	
	/**
    * Page or User ID
    * 
    **/
	protected static $id = '';
	
	/**
    * Page, User, or App
    * 
    **/
	protected static $auth_type = '';
	
	/**
    * Get the Auth Type Token
    *
    * @return string auth type
    **/
	public static function getAuthType(){
		return self::$auth_type;
	}
	
	/**
    * Get the App Token
    *
    * @return string Token
    **/
	public static function getAppToken(){
		return self::$apptoken;
	}
	
	/**
    * Get the Page Token
    *
    * @return string Token
    **/
	public static function getPageToken(){
		return self::$pagetoken;
	}
	
	/**
    * Get the proper token based on auth type
    *
    * @return string Token
    **/
	public static function getToken(){
		$type = self::getAuthType();
		$token = ($type == "page") ? self::getPageToken() : self::getAppToken();
		return $token;
	}
	
	/**
    * Set the App Token
    *
    * @param string $fb_token   API Key
    */   
	public static function setAppToken($app_token){
	 	self::$apptoken = $app_token;
 	}
 	
 	/**
    * Set the Page Token
    *
    * @param string $fb_token   API Key
    */   
	public static function setPageToken($page_token){
	 	self::$pagetoken = $page_token;
 	}
 	
 	/**
    * Set the Auth Type
    *
    * @param string $type  app,page,user
    */   
	public static function setAuthType($type){
	 	self::$auth_type = $type;
 	}
 	
 	/**
    * Get the User/Page Id
    *
    * @return string ID
    **/
	public static function getId(){
		return self::$id;
	}
	
	/**
    * Set the User/Page Id
    *
    * @param string $fb_id
    */   
	public static function setId($fb_id){
	 	self::$id = $fb_id;
 	}
 	
 	public static function getFbAuth(){
 		$fb = DataObject::get_one("AuthToken");
		return $fb->Token;
	}
 	/**
    * Set the Auth Token
    *
    * @param string $fb_token   API Key
    * @param string $api_secret API Secret
    */ 
    function __construct($expiry=NULL,$id="",$auth_type="app",$auth_token=''){
    	self::setId($id);
    	self::setAuthType($auth_type);
    	if($auth_type=="app"){
    		$tok = self::getFbAuth();
    		if(!$tok){
				$faceauth = new FacebookAuthService();
				$tok = $faceauth->getAppToken();
			}
			self::setAppToken($tok);
			
    	}else if($auth_type=="user"){
    		$tok = $auth_token;
    		if(!$tok){
				//No Token. Token required.
				user_error("Missing Authentication Token");
			}
			self::setAppToken($tok);
		}else{
			//Page
    		$tok = self::getFbAuth();
    		if(!$tok){
				$faceauth = new FacebookAuthService();
				$tok = $faceauth->getAppToken();
				$base="https://graph.facebook.com/".$id."?fields=access_token&access_token=".$tok;
			}else{
				$base="https://graph.facebook.com/".$id."?fields=access_token&access_token=".$tok;
			}
    		$pageauth = file_get_contents($base);
    		$resp_obj = json_decode($pageauth,true);
			self::setAppToken($tok);
			self::setPageToken($resp_obj['access_token']);
    	}
        parent::__construct('https://graph.facebook.com/', $expiry);
        $this->checkErrors = true;
    }
    
    
    public function searchPublic($q ='watermelon',$type='post',$center='',$distance=''){
    	$subUrl = "search?";
    	$subUrl .= "q=".$q."&";
    	$subUrl .= "type=".$type;
    	$req = self::request($subUrl);
    	return $req->getBody();
    }
    
    public function publishPost($message='',$link=''){
    	$token = self::getToken();
    	$id = self::getId();
    	$subUrl = $id."/feed";
    	$data = "message=".$message;
    	$data .= "&link=".$link;
    	if($link != ''){
    		$data .= "&type=link";
		}
    	$data .= "&access_token=".$token;
    	$req = self::request($subUrl,'POST',$data);
    	return $req;
    }
    
    public function publishToUserWall($message='',$link=''){
    	$token = self::getToken();
    	$id = self::getId();
    	$subUrl = $id."/feed";
    	$data = "message=".$message;
    	$data .= "&link=".$link;
    	if($link != ''){
    		$data .= "&type=link";
		}
    	$data .= "&access_token=".$token;
    	$req = self::request($subUrl,'POST',$data);
    	return $req;
    }
    
}
