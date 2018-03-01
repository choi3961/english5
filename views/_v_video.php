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
        <div class = "video_pannel">
            <!-- displays the contents of the page -->
            <?php if(isset($content)) echo $content; ?>
            <?php if(isset($client_files_body)) echo $client_files_body; ?>
        </div>
        </div>
    </body>
</html>