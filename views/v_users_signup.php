<!-- This is sign up page to be displayed -->
<div class = 'header'> 회원 가입 </div>
<div class='center'>
    <!-- sign up interface page -->
    <form method='POST' action='/users/p_signup' class='form-standard'>
        아이디 <span class = 'required'>*</span><br>
        <input type='text' name='first_name' required><br><br>
        비밀 번호 <span class = 'required'>*</span><br>
        <input type='password' name='password' required><br><br>  
        <!--
        비밀 번호 재확인<span class = 'required'>*</span><br>
        <input type='password' name='password_re' required><br><br>   -->            
        Email <span class = 'required'>*</span><br>
        <input type='text' name='email' required><br><br>
        휴대전화번호 <span class = 'required'>*</span><br>
        <input type='text' name='last_name' required><br><br>

        <?php if($error == 'error'): ?>
        <div class='error'>
            Sign up failed. Please fill out all the fields.
        </div><br>
        <?php endif; ?>
        <?php if($error == 'failed'): ?>
        <div class='error'>
            Sign up failed. Your email is already registered.
        </div><br>
        <?php endif; ?>
        
        <input type='submit' value = '가입하기'>
    </form>
</div>