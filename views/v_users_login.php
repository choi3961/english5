<!-- This is login page to be rendered-->
<div class = 'header'>Log in </div>
<div class='center'>
    <!-- login interface -->
    <form method='POST' action='/users/p_login' class='form-standard'>
        Email<br>
        <input type='text' name='email' required><br><br>
        Password<br>
        <input type='password' name='password' required><br><br>
        <?php if($error == 'error'): ?>
        <div class='error'>
            로그인 실패.. 아이디와 비밀번호를 재확인 하시기 바랍니다.
        </div><br>
        <?php endif; ?>

        <?php if($error == 'registered'): ?>
        <div class='error'>
            You are registered.
        </div><br>
        <?php endif; ?>

        <?php if($error == 'login'): ?>
        <div class='error'>
            로그인 하시기 바랍니다.
        </div><br>
        <?php endif; ?>

        <input type='submit' value='Log in'>
    </form>
</div>