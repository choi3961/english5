<!-- This is the landing page first displayed for the application -->
	<div class='header'>
		
	</div>
	<div class='header'>
		Easier, Faster, Deeper
	</div>
	<div class='header'>
		
	</div>	
	<div class='header'>
		영어!!!
	</div>	
	<div class="space"></div>	
	<div class='header'>
		긴 문장을 잘하면 잘하고,
	</div>	
	<div class="space"></div>
	<div class='header'>
		긴 문장을 못하면 못한다.
	</div>	
			
	<div class='header'>
		
	</div>	

	<div class = 'body'>
		<div class='center'>
		<!-- 
			<?php if(!$user): ?>
			<form method='POST' action='users/p_login' class='form-standard'>
				이메일<br>
				<input type='text' name='email'><br>
				비밀번호<br>
				<input type='password' name='password'><br><br>
				<input type='submit' value='로그인'><br>
			</form>
			<?php else: ?>
			<div>Go to <a href="/posts/add">post</a></div>
			<div>Go to <a href="/posts/mypage">myposts</a></div>
			<div>Go to <a href="/posts/index">index</a></div>
			<?php endif ?>
		-->			
		</div>
	</div>

	<div id = 'guts_footer'>
        <?php if(!$user): ?>	
			<div>
				Sign up is free!! 회원 가입하시기 바랍니다!!
				<div class="space"></div>
				<form action = '/users/signup' class = 'form-standard'>
					<input type = 'submit' value = 'sign up'>
				</form>
			</div>
		<?php else: ?>
			<div class="guts_footer02">
				긴 문장을 모르면 영어의 늪에 빠진다.
			</div>			

		<?php endif; ?>
		<script src="/js/customer_guide.js"></script>
	</div>


