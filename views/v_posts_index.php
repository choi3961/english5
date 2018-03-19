<!-- This shows the posts the user follows -->
<div class="space"></div>
<div class = 'header'>질문게시판</div>
<div class="center">편하게 질문하세요</div>
<div class="space"></div>

<?php
/*************
        $q="SELECT 
            posts.content,
            posts.created,
            posts.user_id,
            users_users.user_id,
            users.first_name,
            users.last_name
            FROM posts
            INNER JOIN users_users
                ON posts.user_id = users_users.user_id_followed
            INNER JOIN users
                ON posts.user_id = users.user_id
            WHERE users_users.user_id = ".$this->user->user_id;    
****************/  
    # Build the query to show the posts which the user follows the posters of
    $q="SELECT 
        posts.content,
        posts.created,
        posts.user_id,
        users.first_name,
        users.last_name
        FROM posts 
        INNER JOIN users
            ON posts.user_id = users.user_id
            ORDER BY created DESC 
           ";

        # Run the query
        $posts = DB::instance(DB_NAME)->select_rows($q);
		$num = 1;
		$num2 = 1; 
		$num3 = 1; 
		$num_knife = 5;		// the number of amount to be showed on the bulletin board.

		//echo count($posts);
		//print_r($posts); 

    # Select * from users_users to show the attached reply to the posts
    $q="SELECT *
        FROM users_users";

        # all the replies
        $replys = DB::instance(DB_NAME)->select_rows($q);
?>

<!--
<div class = 'num-nav'>
	<?php foreach ($posts as $key):?>
		<?php if ($num2%$num_knife == 0):?>
			<?php $temp = $num2/$num_knife; ?>
			<?php $temp2 = $temp+1; ?>
			<a href="/posts/index/<?=$temp?>"> &#60;<?= $temp; ?>&#62; </a>  
		<?php endif; ?>	

		<?php $num2++;?>

	<?php endforeach; ?>

	<a href="/posts/index/<?=$temp2 ?>"> &#60;<?= $temp2; ?>&#62; </a>			 	 
</div>
    =========== -->
<?php foreach($posts as $post): ?>

	<!-- 5*0 < A part(or 1, 2, 3, 4, 5) <= 5*1  -->
	<!-- 5*1 < B part(or 6, 7, 8, 9, 10) <= 5*2 -->
	<!-- 5*2 < C part(or 11, 12, 13, 14, 15) <= 5*3 -->
	<?php if( (($num_div * $num_knife > $num) || ($num_div * $num_knife == $num)) && (($num_div-1) * $num_knife < $num) ):  ?>

		<!-- $posts[$num]['first_name']  This phrase is not necessary    -->

		<?php $content = nl2br($post['content']); ?>	
		<div class = 'article'>
			<article>
			    <div class = 'article-header'><?=$post['first_name']?>님의 질문:</div>
			    <div class = 'article-content'><p><?=$content?></p></div>
			    <div class = 'article-time'>
			    	<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
			        	<?=Time::display($post['created'])?>
			    	</time>
			    </div>
			    <div></div>
			    <div class="space"></div>
			    <div class="article-attach">답글:</div>
			    <div class = 'article-reply' id="temp">
			    	<form method="POST" action="/posts/p_attach/<?=$post['created']?>">
			    		<textarea rows="7" cols="69" name="content" class="reply"></textarea>
			    		<input type="submit" value= "등록">
			    	</form>
			    </div>	
			    <div class="space"></div>
			    <div>
					<?php foreach($replys as $reply): ?>
						<?php $content_replied = nl2br($reply['content']); ?>
				    	<div>
				    		<?php if($post['created'] == $reply['tag']):?>
				    			<div class = 'article-replied'><?=$content_replied?></div>
				    		<?php endif; ?>
				    	</div>
					<?php endforeach; ?>			    	
			    </div>	   	        
			</article>
		</div>		

	<?php endif; ?>	
	<?php $num++; ?>
<?php endforeach; ?>

<!-- 
<div class = 'num-nav'>
	<?php foreach ($posts as $key):?>
		<?php if ($num3%$num_knife == 0):?>
			<?php $temp = $num3/$num_knife; ?>
			<?php $temp2 = $temp+1; ?>
			<a href="/posts/index/<?=$temp?>"> &#60;<?= $temp; ?>&#62; </a>  
		<?php endif; ?>	

		<?php $num3++;?>

	<?php endforeach; ?>

	<a href="/posts/index/<?=$temp2 ?>"> &#60;<?= $temp2; ?>&#62; </a>			 	 
</div>
-->
<script src="/js/reply.js"></script>



