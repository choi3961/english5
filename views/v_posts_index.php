<!-- This shows the posts the user follows -->
<div class = 'header'>질문게시판(편하게 질문하세요?)</div>

<?php foreach($posts as $post): ?>
<div class = 'article'>
	<article>
	    <div class = 'article-header'><?=$post['first_name']?> <?=$post['last_name']?> posted:</div>
	    <div class = 'article-content'><p><?=$post['content']?></p></div>
	    <div class = 'article-time'>
	    	<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
	        	<?=Time::display($post['created'])?>
	    	</time>
	    </div>
	</article>
</div>
<?php endforeach; ?>
