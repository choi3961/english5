<!-- This displays the user's own page of posts -->
<div class = 'header'>POSTS</div>

<?php foreach($posts as $post): ?>
<div class = 'myposts'>
	<article>
	    <div class = 'article-header'>You posted:</div>
	    <div class = 'article-content'><p><?=$post['content']?></p></div>
	    <div class = 'article-time'>
	    	<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
	        	<?=Time::display($post['created'])?>
	    	</time>
	    </div>
	</article>
</div>
<div class = 'article-control'>
	<div>
		<form action = "/posts/update/<?=$post['post_id']?>" method = "post" >
			<input type = 'submit' value = 'update'>
		</form>
	</div>
	<div>
		<form action = "/posts/remove/<?=$post['post_id']?>" method = "post" >
			<input type = 'submit' value = 'remove' onClick = "return confirm('Will you really remove this post?');">
		</form>
	</div>
</div>
<?php endforeach; ?>