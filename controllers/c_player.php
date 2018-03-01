<?php
# This class contols the users requests. i,e, sign up or log in, etc.
class player_controller extends video_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function play($num) {
        //echo $num;
        # Setup view
        $this->template->content = View::instance('v_lectures_video');
        $this->template->title = "Lecture".$num."video";
        //$this->template->content->error = $error;
             
        # Render template
        echo $this->template;           
    }        
} # end of the class