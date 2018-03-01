<!-- This is login page to be rendered-->
<div class = 'header'>아이디 찾기 / 비밀번호 찾기 </div>
<div class='center'>
    <!-- login interface -->
    <form method='POST' action='/users/p_search_id/email' class='form-standard'>
        이메일을 입력하세요<br/><br/>
        <input type='text' name='email' required placeholder="Email"><br><br>
        <input type='submit' value='아이디/비밀번호 찾기'>
    </form>
</div>