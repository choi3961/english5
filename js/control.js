// jquery event handler
$(function(){
    // Error checking on the input data in the form.
    $('input[name=email]').change(function(){
        var temp = $(this).val();
        var temp02 = /(\w+?@\w+?\x2E.+)/;
        if(!temp02.test(temp)){
            $('#email').html("Unvalid email?!").css('color','red');
            $('input[name=email]').val("");
        }
        else{
            $('#email').html("Valid email").css('color','black');
        }
    });  

    // Error checking on the input data in the form.
    $('input[name=email]').keypress(function(){
        var temp = $(this).val();
        var temp02 = /(\w+?@\w+?\x2E.+)/;
        if(!temp02.test(temp)){
            $('#email').html("Unvalid email?!").css('color','red');
        }
        else{
            $('#email').html("Valid email").css('color','black');
        }
    });     

    // Error checking on the input data in the form.
    $('input[name=password').change(function(){
        var temp = $(this).val();
        if(temp.length<6){
            $('#password').html("Too short?! 6 characters at least.").css('color','red');
            $('input[name=password]').val("");
        }
        else{
            $('#password').html("Possible password!").css('color','black');
        }
    });

    // Error checking on the input data in the form.
    $('input[name=password').keypress(function(){
        var temp = $(this).val();
        if(temp.length<5){
            $('#password').html("Too short?! 6 characters at least.").css('color','red');
        }
        else{
            $('#password').html("Possible password!").css('color','black');
        }
    });

    // Error checking on the input data in the form.
    $('input[name=domain_address]').change(function(){
        var temp = $(this).val();
        var temp02 = /^[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,6}$/;
        if(!temp02.test(temp)){
            $('#domain_address').html("Unvalid domain name?!").css('color','red');
            $('input[name=domain_address]').val("");
        }
        else{
            $('#domain_address').html("Valid domain name").css('color','black');
        }
    });  

    // Error checking on the input data in the form.
    $('input[name=domain_address]').keypress(function(){
        var temp = $(this).val();
        var temp02 = /^[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,6}$/;
        if(!temp02.test(temp)){
            $('#domain_address').html("Unvalid domain name?!").css('color','red');
        }
        else{
            $('#domain_address').html("Valid domain name").css('color','black');
        }
    });  

    // Error checking on the select data in the form.
    $('select[name=local]').change(function(){
        var temp = $('select[name=local]').val();
        if(!temp){
            alert("You should select right local");
        }
    });

    // Error checking on the select data in the form.
    $('select[name=category02]').change(function(){
        var temp = $('select[name=category02]').val();
        if(!temp){
            alert("You should select right category");
        }
    });           
});