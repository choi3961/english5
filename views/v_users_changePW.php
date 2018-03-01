<!-- This is login page to be rendered-->
<div class = 'header'>비밀 번호 변경 </div>
<div class='center'>
    <!-- login interface -->
    <form method='POST' action='/users/p_change_password' class='form-standard'>
        이메일을 입력하세요<br/><br/>
        <input type='text' name='email' required placeholder="Email"><br><br>
        변경전 비밀번호<br/><br/>
        <input type='text' name='password' required ><br><br>         
        변경된 비밀번호<br/><br/>
        <input type='text' name='password_changed' required ><br><br>        
        <input type='submit' value='비밀 번호 변경'>
    </form>
</div>