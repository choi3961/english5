<!DOCTYPE html>
<!-- This the basic template for project2 -->
<html>
    <head>
    	<title><?php if(isset($title)) echo $title; ?></title>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
        <script src="http://jwpsrv.com/library/2q3BJsTvEeO4_CIACmOLpg.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <!--<link rel="stylesheet" type="text/css" href="/css/main02.css"> -->
        <link rel="stylesheet" type="text/css" href="/css/style.css">					
    	<!-- Controller Specific JS/CSS -->
    	<?php if(isset($client_files_head)) echo $client_files_head; ?>
    </head>
    <body>	
        <!-- This is the interface for the pages the users could access through easily -->
        <div id="container">
            <div id='menu0'>
                <a href='/'>Home </a> |
                <!-- Menu for users who are logged in -->
                <a href='/users/signup' class = 'menu-users'>Signup</a> |
                <a href='/users/login' class = 'menu-users'>Login</a> |
                <?php if($user):?>
                    <a href='/users/logout'>Logout</a> |
                    <a href='/posts/add' class = 'menu-posts'>Add-post</a> |
                    <a href='/posts/index' class = 'menu-posts'>Following-posts</a> |
                    <a href='/posts/mypage' class = 'menu-posts'>My-posts</a> |
                    <a href='/posts/users' class = 'menu-posts'>Users</a> |
                <?php endif;?>
            </div>
            <div class='greetings'>
                <?php if($user) echo "환영합니다 $user->first_name 회원님"; ?>
            </div>            
            <div class = 'header01'>
                <a href="/">English English</a>
            </div>        
            
            <div class = 'sidebar'  id='left_side'>
                <div class="img"><img src="/image/book_cover001.jpg" alt='영어의 비밀' width="150"/></div>  
                <div class="img"><img src="/image/book_cover002.jpg" alt='영어가 길어지는 10가지 이유' width="150"/></div> 
            </div>
            <div class = 'sidebar' id='right_side'>
                <div class='center'>        
                    <?php if(!$user): ?>

                    <div class="space"></div>                                           
                    <form method='POST' action='/users/p_login' class='form-standard'>
                        <input type='text' name='email' placeholder="이메일"><br>
                        <input type='password' name='password' placeholder="비밀 번호"><br><br>
                        <input type='submit' value='로그인'><br>
                    </form>
                    <?php else: ?>
                    <div>Go to <a href="/posts/add">post</a></div>
                    <div>Go to <a href="/posts/mypage">myposts</a></div>
                    <div>Go to <a href="/posts/index">index</a></div>
                    <?php endif ?>
                    
                </div>
                <div>
                    <a href="/users/search_id">아이디/비밀번호 찾기</a>
                </div>  
                <div class="space"></div> 

                <div>
                    <a href="/users/change_password">비밀 번호 변경 </a>
                </div>   
                <div class="space"></div>                                                             
                <div>
                    <a href="/users/signup">회원 가입 </a>
                </div>   
                <div class="img"><img src="/image/book_cover001.jpg" alt='영어의 비밀' width="150"/></div>
                <div class="img"><img src="/image/book_cover002.jpg" alt='영어가 길어지는 10가지 이유' width="150"/></div>
            </div>

            <div id = 'contents'>
            	<div id='menu'>
                    <a href='/'>Home</a> |
                    <a href = '/lectures/index/lec01' title="The Secret of English 영어의 비밀">강의 듣기 1</a> |  
                    <a href = '/lectures/index/lec02' title="영어가 길어지는 10가지 이유">강의 듣기 2</a> |                    
                    <a href = '/lectures/index/register' title="무료 수강 신청">수강 신청</a> |  
                    <a href = '/purchase/index/'>도서 구매</a> |  
                    <a href = '/posts/index/'>게시판</a> |                      

<!--                <a href = '/posts/mypage/'> myposts </a> | 
                    <a href="/posts/index">index </a> |
                    <a href="/posts/users">users </a> |
                    <a href="/posts/add">addPost </a>|  --> 

                    <!-- Menu for users who are logged in -->
                    <?php if($user): ?>
                    <a href='/users/logout'>Logout </a> |
                    <a href='/users/profile'>Profile  </a> |
                    <!-- Menu options for users who are not logged in -->
                    <?php else: ?>
                        <a href='/users/login'>로그인</a> |
                        <a href='/users/signup'>회원 가입</a> |                         
                    <?php endif; ?>                    


                </div>
            
                <!-- contains whole bunch of contents -->
                <div class = "guts">
                    <!-- displays the contents of the page -->
                  	<?php if(isset($content)) echo $content; ?>
                	<?php if(isset($client_files_body)) echo $client_files_body; ?>
                </div>
            </div>
            <div class="clear"></div>            
            <!-- footer part -->
            <div class = 'footer'> 
                Copyright &copy; 2018 유니버스 출판 All rights are reserved.
            </div>            
        </div>
    </body>
</html>