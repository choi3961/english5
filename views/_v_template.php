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
                | <a href='/'>Home </a> |
                <!-- Menu for users who are logged in -->
                <?php if($user):?>
                    <a href='/users/logout'>Logout</a> |
                    <a href='/posts/add' class = 'menu-posts'>질문하기</a> |
                    <a href='/posts/mypage' class = 'menu-posts'>나의 질문</a> |
                    <a href = '/posts/index/1'>게시판</a> | 
                <!--    <a href='/users/profile'>My Page  </a> |
                    <a href='/posts/users' class = 'menu-posts'>Users</a> |
                <a href='/posts/index' class = 'menu-posts'>Following-posts</a> |-->
                <?php else:?>
                    <a href='/users/signup' class = 'menu-users'>Signup</a> |
                    <a href='/users/login' class = 'menu-users'>Login</a> |                
                <?php endif;?>
            </div>
            <div class='greetings'>
                <?php if($user) echo "환영합니다 $user->first_name 회원님"; ?>
            </div>            
            <div class = 'header01'>
                <a href="/">English English</a>
            </div>        
            
            <div class = 'sidebar'  id='left_side'>
                <div class="center02">
                    <div id="best_way"></div>  
                    <div id='explain'></div>
                    <div class="space"></div>                  
                    <div id="maxim"></div>
                    <div class="space"></div>
                    <div id="customer_guide"></div>                    
                </div>
                <div class="img"><img src="/image/book_cover001.jpg" alt='영어의 비밀' width="150"/></div>  
                <div class="img"><img src="/image/book_cover002.jpg" alt='영어가 길어지는 10가지 이유' width="150"/></div>          
            </div>
            <div class = 'sidebar' id='right_side'>
                <div class='center02'>        
                    <?php if(!$user): ?>
                    <div class="space"></div>                                           
                    <form method='POST' action='/users/p_login' class='form-standard'>
                        <input type='text' name='email' placeholder="이메일"><br>
                        <input type='password' name='password' placeholder="비밀 번호"><br>
                        <div class="space05"></div> 
                        <input type='submit' value='로그인'><br>
                    </form>
                    <div>
                        <a href="/users/signup">회원 가입 </a>
                    </div>                    
                    <?php else: ?>
                    <div>Go to <a href="/posts/add">질문하기</a></div>
                    <div>Go to <a href="/posts/mypage">나의 질문</a></div>
                    <div>Go to <a href="/posts/index/1">게시판</a></div>
                    <?php endif ?>
                    <div class="space05"></div>
                    <div>
                        <a href="/users/search_id">I D / 비밀번호 찾기</a>
                    </div>  
                    <div class="space05"></div> 
                    <div>
                        <a href="/users/change_password">비밀 번호 변경 </a>
                    </div>   
                    <div class="space05"></div>                                                             

                </div>

                <div class="img"><img src="/image/book_cover001.jpg" alt='영어의 비밀' width="150"/></div>
                <div class="img"><img src="/image/book_cover002.jpg" alt='영어가 길어지는 10가지 이유' width="150"/></div>
            </div>

            <div id = 'contents'>
            	<div id='menu'>
                    <a href='/'>| Home</a> |
                    <a href = '/lectures/index/lec01' title="The Secret of English 영어의 비밀">강의 듣기 1</a> |  
                    <a href = '/lectures/index/lec02' title="영어가 길어지는 10가지 이유">강의 듣기 2</a> |
                    <a href = '/lectures/index/register' title="무료 수강 신청">수강 신청</a> |  
                    <!--<a href = '/purchase/index/'>도서 구매</a> |  -->
                    <a href = '/posts/index/1'>게시판</a> |                      

<!--                <a href = '/posts/mypage/'> myposts </a> | 
                    <a href="/posts/index">index </a> |
                    <a href="/posts/users">users </a> |
                    <a href="/posts/add">addPost </a>|  --> 

                    <!-- Menu for users who are logged in -->
                    <?php if($user): ?>
                    <a href='/users/logout'>Logout </a> |
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
            <div class="space"></div>
            <div class = 'footer'> 
                Copyright &copy; 2018 English English All rights are reserved.
            </div>     
        </div>
        <script src="/js/maxim.js"></script> 
        <script src="/js/customer_guide02.js"></script>         
    </body>
</html>