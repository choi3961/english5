<?php
#This is the parent of all video controller.
class video_controller {
	
	public $user;
	public $userObj;
	public $template;
	public $email_template;

	public function __construct() {
		# Instantiate User obj
		$this->userObj = new User();
			
		# Authenticate / load user
		$this->user = $this->userObj->authenticate();					
						
		# Set up templates
		$this->template 	  = View::instance('_v_video');
		$this->email_template = View::instance('_v_email');			
								
		# So we can use $user in views			
		$this->template->set_global('user', $this->user);

	}
} # eoc
