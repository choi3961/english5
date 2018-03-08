<!-- This shows the posts the user follows -->
<div class="space"></div>
<div class = 'header'>질문게시판</div>
<div class="center">편하게 질문하세요</div>
<div class="space"></div>

<?php foreach($posts as $post): ?>
<div class = 'article'>
	<article>
	    <div class = 'article-header'><?=$post['first_name']?>님의 질문:</div>
	    <div class = 'article-content'><p><?=$post['content']?></p></div>
	    <div class = 'article-time'>
	    	<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
	        	<?=Time::display($post['created'])?>
	    	</time>
	    </div>
	    <div class="space"></div>
	    <div class="article-attach">답글:</div>
	    <div class = 'article-reply' id="temp">
	    	<form method="POST" action="/posts/p_attach">
	    		<textarea rows="3" cols="69" name="content" class="reply"></textarea>
	    		<input type="submit" value= "등록">
	    	</form>
	    </div>	
	    <div class="space"></div>
	    <div class = 'article-replied'>
	    	Answer:
	    	<div>
	    		Dummy sentence. What is this?
	    	</div>

	    </div>	   	        
	</article>
</div>
<?php endforeach; ?>
<script src="/js/reply.js"></script>
