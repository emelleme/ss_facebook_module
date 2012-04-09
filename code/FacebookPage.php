<?php
/**
 * Defines the Forms and Reports page type
 */
class FacebookPage extends Page {
   static $db = array(
		"AuthCode" => "Varchar(255)",
		"AuthToken" => "Varchar(255)"
   );
   static $has_one = array(
   );
   //static $can_be_root = false;
   //static $allowed_children = "none";
   static $allowed_children = array("none");
   
   public function canCreate() {       
        $member = Member::currentUser();
        if($member->inGroup(1)) return true;
        else return false;
     }
     
     public function canEdit() {       
        $member = Member::currentUser();
        if($member->inGroup(7)) return false;
        else return true;
    }
     public function canDelete() {       
        $member = Member::currentUser();
        if($member->inGroup(1)) return true;
        else return false;
     } 

	public function getCMSFields() {
        $fields = parent::getCMSFields();       

        return $fields;
  }
	
}
 
class FacebookPage_Controller extends Page_Controller {
	public function init(){
		parent::init();
		
		
		
		
	}
	
	public function facebook(){
		Session::clear('FBCode');
		//Check Request Variable
		$code = $this->request['code'];
		if($code){
			//Set Session variable
			Session::set('FBCode', $code);
			$fb = DataObject::get_one('AuthToken');
			if(!$fb){
				$fb= new AuthToken();
			}
			$fb->Code = $code;
			$fb->write();
		}
		Requirements::css('FacebookService/css/facebook.css');
		echo Session::get('FBCode');
		Director::redirect('http://www.facebook.com/phillypolice');
	}
	
	public function fb(){
		$fb = DataObject::get_one('AuthToken');
		var_dump($fb);
	}
}
 
?>
