<?php
# This class contols the users requests. i,e, sign up or log in, etc.
class purchase_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function index() {
        # Setup view
        $this->template->content = View::instance('v_purchase_index');
        $this->template->title = "Purchase";
        //$this->template->content->error = $error;


// Test Email sending
/////////////////////////////////////////////////////////////////////////
            // the message
            $msg = "First line of text\nSecond line of text";

            // use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);

            // send email
            mail("choi3961@naver.com","My subject",$msg);
//////////////////////////////////////////////////////////////////////////   

        # Render template
        echo $this->template;
    }

    public function buy($book = NULL) {
        # Setup view
        $this->template->content = View::instance('v_purchase_book');
        $this->template->title = $book_title;
        //$this->template->content->error = $error;
             
        # Render template
        echo $this->template;
    }    
}    
