// Display lecture list
$path = location.pathname;
if ($path.substring(16,21) ==="lec01") {
    var url = "/xml/lecture2.xml"; 
    var lec = "";
    fileRequest(url, lec, display01);
    //display(data);
}
else if ($path.substring(16,21) ==="lec02"){
    var url = "/xml/lectures.xml"; 
    var lec = "";     
    fileRequest(url, lec, display01);
}

// if the substring is register in lectures/index/register
else{
    var url = "/xml/question01.xml";   
    var lec = "";    
    fileRequest(url, lec, register);
}

// when the user tries to register lecture 1
$("#reg01").click(function(){
    var url = "/xml/question01.xml";  
    var lec_name = "l_r01"; 
    fileRequest(url, lec_name, question);    
});

// when the user tries to register lecture 2
$("#reg02").click(function(){
    var url = "/xml/question02.xml"; 
    var lec_name = "l_r02";  
    fileRequest(url, lec_name, question);    
    //prompt(num);
});


function fileRequest(url, lec_name, display){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

          if(this.responseXML){
              display(this, lec_name);   
          } 
          else alert("failed");
      }
    };
    xhttp.open("POST", url, true);
    xhttp.send();
}

function display01(xml){
    var i;
    var xmlDoc = xml.responseXML;
    var table="<tr><th>Lecture</th><th>Title</th></tr>";
    var x = xmlDoc.getElementsByTagName("lecture");
    for (i = 0; i <x.length; i++) {
      if( i>9 ){
        table += "<tr><td>" + "<a href='" +  "/player/play/lec0" + i + "'>Lecture" + i + "</a>" + "</td><td>" + x[i].children[0].childNodes[0].nodeValue + "</td></tr>" ;
      }
      else{
        table += "<tr><td>" + "<a href='" +  "/player/play/lec00" + i + "'>Lecture" + i + "</a>" + "</td><td>" + x[i].children[0].childNodes[0].nodeValue + "</td></tr>" ;
      }
    }
    document.getElementById("first").innerHTML = table;
}

function register(xml){
    var xmlDoc = xml.responseXML;
    var x = xmlDoc.getElementsByTagName("question");  
    var question = x[2].children[0].childNodes[0].nodeValue;
    document.getElementById("reg01").innerHTML = "<button>The Secret of English 영어의 비밀</button>";
    document.getElementById("reg02").innerHTML = "<button>영어가 길어지는 10가지 이유</button>";
}  

// lecture register for the user who is logged in after testing a question.
function question(xml, lec_name){
    var xmlDoc = xml.responseXML;
    var x = xmlDoc.getElementsByTagName("question");     
    var num = Math.floor((Math.random() * 10) + 1);  
    var answer = prompt(x[num].children[0].childNodes[0].nodeValue);

//////////////////////////////
// if answer is correct call the server function, to say server URL, to register lecture into the database.
    if(answer === x[num].children[1].childNodes[0].nodeValue){
        location.assign("/users/lecture_register/"+lec_name);
    }

//////////////////////////////
}

function random(){
    return Math.floor((Math.random() * 10) + 1);
}  