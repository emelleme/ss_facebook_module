<?php

    #doc
    #    classname:    AuthToken
    #    scope:        Private
    #
    #/doc
    
    class AuthToken extends DataObject
    {
        #    internal variables
        static $db = array(
			'Token' => 'Varchar(255)',
			'Code' => 'Varchar(255)'
	    );
	    public static $apply_restrictions_to_admin = false;
	    
        static $api_access = false;
	    function canView() { return true; }
        ###    
    
    }
    ###

?>
