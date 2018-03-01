<?php
# This class contols the users requests. i,e, sign up or log in, etc.
class lectures_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            Router::redirect('/users/login/login');
        }   
    } 

    // This is about lecture listening
    public function index($num = NULL) {

        // lecture number is 1(), check if the lectue 1 is registered.
        if ($num === "lec01") {

            // if the user had registered the lecture 1, do nothing.
            if ($this->user->l_r01 == 3) {
                //echo $this->user->l_r01 ;
            }
            // if the user had not registered the lecture, redirect to "/lectures/index/register".
            else{
                Router::redirect('/lectures/index/register');
            }
        }
        // lecture number is 2(), check if the lectue 2 is registered.       
        elseif ($num === "lec02") {

            // if the user had registered the lecture 2, do nothing.            
            if ($this->user->l_r02 == 3) {
                //echo $this->user->l_r02 ;
            }
            // if the user had not registered the lecture, redirect to "/lectures/index/register".            
            else{
                Router::redirect('/lectures/index/register');
            }
        }
        // if the user tries to register the lectue("/lectures/index/register"), do nothing.
        else{
        }

        # Setup view
        $this->template->content = View::instance('v_lectures_lists');
        $this->template->title = "Lectures";
        //$this->template->content->error = $error;
             
        # Render template
        echo $this->template;        
    }
} # end of the class