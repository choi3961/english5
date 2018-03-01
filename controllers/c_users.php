<?php
# This class contols the users requests. i,e, sign up or log in, etc.
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function index() {
        echo "This is the index page=======";
    }
    # renders interface of sign up
    public function signup($error = NULL) {
        # Setup view
        $this->template->content = View::instance('v_users_signup');
        $this->template->title = "Sign Up";
        $this->template->content->error = $error;
             
        # Render template
        echo $this->template;
    }
    # register a new user into the database.
    public function p_signup() {
        #error checking : if not fullfilled, send the error message.
        if(!$_POST['first_name']||!$_POST['last_name']||!$_POST['email'] || !$_POST['password']){
            Router::redirect("/users/signup/error");
        }

        #error checking : compare POST data with database data
        $email = $_POST['email'];

        $q = "select email from users
             where email = '$email'";
        $exist = DB::instance(DB_NAME)->select_field($q);     
        //compare POST with database already registered
        if($exist==$email){
            Router::redirect('/users/signup/failed');
        }
        
        # More data we want stored with the user
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        # Encrypt the password  
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            

        # Create an encrypted token via their email address and a random string
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

        # Insert this user into the database
        $user_id = DB::instance(DB_NAME)->insert('users', $_POST);

        //sending mail when a user signed up
        $to[]    = Array("name" => APP_NAME, "email" => $email);
        $from    = Array("name" => APP_NAME, "email" => APP_EMAIL);
        $subject = "Message from SQUAWK";              
        $body = View::instance('v_email_example');
        $cc = "";
        $bcc = "";
    
        # Send email
        Email::send($to, $from, $subject, $body, true, $cc, $bcc);

        Router::redirect('/users/login/registered');
    }
    #interface of login page.
    public function login($error = NULL) {

        # Setup view
        $this->template->content = View::instance('v_users_login');
        $this->template->title   = "Login";
        # Pass data to the view
        $this->template->content->error = $error;

        # Render template
        echo $this->template;
    }
    # processes the request of a user's login.
    public function p_login() {

        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Hash submitted password so we can compare it against one in the db
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Search the db for this email and password
        # Retrieve the token if it's available
        $q = "SELECT token 
            FROM users 
            WHERE email = '".$_POST['email']."' 
            AND password = '".$_POST['password']."'";

        $token = DB::instance(DB_NAME)->select_field($q);   

        # If we didn't get a token back, it means login failed
        if(!$token) {

            # Send them back to the login page
            Router::redirect("/users/login/error");

        # But if we did, login succeeded! 
        } else {
            /* 
            Store this token in a cookie using setcookie()
            Important Note: *Nothing* else can echo to the page before setcookie is called
            Not even one single white space.
            param 1 = name of the cookie
            param 2 = the value of the cookie
            param 3 = when to expire
            param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
            */
            setcookie("token", $token, strtotime('+1 year'), '/');

            # Send them to the main page - or whever you want them to go
            Router::redirect("/posts/index");
        }
    }

    public function logout() {

        # Generate and save a new token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        # Create the data array we'll use with the update method
        # In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);

        # Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

        # Delete their token cookie by setting it to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');

        # Send them back to the main index.
        Router::redirect("/");
    }

    # Shows the profile of a user.
    public function profile() {
        #If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user){
            Router::redirect('/users/login/login');
        }

        #If they weren't redirected away, continue:

        #setup view
        $this->template->content =View::instance('v_users_profile');
        $this->template->title = "Profile of".$this->user->first_name;

        echo $this->template;
    }


/////////////////////////////////////////////////
    # register a lecture for the logged-in user when asked by the user after checking.
    public function lecture_register($data = NULL) {

        //Update lecture_registered of this user into the database

        $q = "UPDATE users SET $data = 3 where user_id = '".$this->user->user_id."'";

        //$q = "UPDATE users SET $data = 9 where email = '".$_POST['email']."'";
        DB::instance(DB_NAME)->query($q);

        //echo $user->first_name;

        //"SELECT token FROM users  WHERE  AND password = '".$_POST['password']."'";



        // Show the result of lecture registering.
        //Router::redirect('/users/lecture_register/result');
        
    }   
/////////////////////////////////////////////////   


/////////////////////////////////////////////////
    # register a lecture for the logged-in user when asked by the user after checking.
    public function search_id($data = NULL) {

        //show interface
        $this->template->content =View::instance('v_users_searchID');

        echo $this->template;      
    }   
/////////////////////////////////////////////////    

/////////////////////////////////////////////////
    # register a lecture for the logged-in user when asked by the user after checking.
    public function p_search_id($data = NULL) {

        $email = $_POST['email'];

        //check database
        $q="SELECT 
            first_name,
            password,
            email
            FROM users
            WHERE email = '".$email."'";

        # Run the query
        $result = DB::instance(DB_NAME)->select_rows($q);

        # Pass data to the View

        $id = $result[0]['first_name'];
        $password = $result[0]['password'];

        // newly-created password
        $newly_password = rand(100000,999999);

        // newly-created password to database

        $password = sha1(PASSWORD_SALT.$newly_password);
        $q = "UPDATE users SET password = '".$password."' where email = '".$email."'";

        //$q = "UPDATE users SET $data = 9 where email = '".$_POST['email']."'";
        DB::instance(DB_NAME)->query($q);  


        //show interface
        $this->template->content =View::instance('v_users_confirmID');

        $this->template->content->id = $id;

        $this->template->content->newly_password = $newly_password;

        echo $this->template;                

        //print_r($posts);
    }   
/////////////////////////////////////////////////        

/////////////////////////////////////////////////
    # user can change the password.
    public function change_password($data = NULL) {

        //show interface
        $this->template->content =View::instance('v_users_changePW');

        echo $this->template;


        
    }   
/////////////////////////////////////////////////    

/////////////////////////////////////////////////
    # register a lecture for the logged-in user when asked by the user after checking.
    public function p_change_password($data = NULL) {

        $email = $_POST['email'];

        //check database
        $q="SELECT 
            first_name,
            password,
            email
            FROM users
            WHERE email = '".$email."'";
        # Run the query
        $result = DB::instance(DB_NAME)->select_rows($q);            


        // change the password in the database from the user logged in if the user is in the database.
        // newly-created password to database
        $password = sha1(PASSWORD_SALT.$_POST['password']);     
        $q = "UPDATE users SET password = '".$password."' where email = '".$email."'";

        //$q = "UPDATE users SET $data = 9 where email = '".$_POST['email']."'";
        DB::instance(DB_NAME)->query($q);          

        // Pass data to the View. 
        $this->template->content =View::instance('v_users_changedPW');  

        echo $this->template;         

        //print_r($posts);   
    }   
/////////////////////////////////////////////////    

} # end of the class