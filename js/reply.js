
// jquery event handler
$(function(){
    // Error checking on the input data in the form.
    $(".article-attach").click(function(event){
      //document.getElementById(event.target.nodeName).appendChild("<div>hello</div>");
      //alert(event.target.id); event.target.className
      //$(this).append("<div><textarea>hello textarea</textarea></dvi>");
      //$("form").toggle();
      //$(this).children("form").toggle();
      $(this).next().toggle();
    });  
     
});

