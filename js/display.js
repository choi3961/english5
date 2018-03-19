// Display lecture list
$path = location.pathname;

//console.log($path.substring(16,21));

if ($path.substring(16,21) ==="lec01") {
    var url = "/xml/lecture01.xml"; 
    var lec = "";
    fileRequest(url, lec, display01);
}
else if ($path.substring(16,21) ==="lec02"){
    var url = "/xml/lecture02.xml"; 
    var lec = "";     
    fileRequest(url, lec, display01);
}

// if the substring is register in lectures/index/register, it means the user tries to register lecture.
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
    var table="<tr><th>Lecture</th><th>Title</th><th><span>천천히 처음부터 수강 바랍니다.</span></th></tr>";
    var x = xmlDoc.getElementsByTagName("lecture");
    var open = 4;
    for (i = 0; i < x.length; i++) {
        j = i+1;

        if (i<open) {
          if( j>9 ){
            table += "<tr><td>" + "<a href='" + "/player/play/lec0" + j + "'>Lecture" + j + "</a>" + "</td><td>" + x[i].children[0].childNodes[0].nodeValue + "</td><td>open</td></tr>" ;
          }
          else{
            table += "<tr><td>" + "<a href='" + "/player/play/lec00" + j + "'>Lecture" + j + "</a>" + "</td><td>" + x[i].children[0].childNodes[0].nodeValue + "</td><td>open</td></tr>" ;
          }            
        }


        else{
          if( j>9 ){
            table += "<tr><td>" + "<a href='" + "/player/play/lec0" + j + "'>Lecture" + j + "</a>" + "</td><td>" + x[i].children[0].childNodes[0].nodeValue + "</td><td>not yet</td></tr>" ;
          }
          else{
            table += "<tr><td>" + "<a href='" + "/player/play/lec00" + j + "'>Lecture" + j + "</a>" + "</td><td>" + x[i].children[0].childNodes[0].nodeValue + "</td><td>not yet</td></tr>" ;
          }

        }




    }
    document.getElementById("lecture_list").innerHTML = table;
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
    answer = answer.toLowerCase();

//////////////////////////////
// if answer is correct call the server function, to say server URL, to register lecture into the database.
    if(answer === x[num].children[1].childNodes[0].nodeValue){
        location.assign("/users/lecture_register/"+lec_name);
    }
    else{
        confirm("수강신청이 불가능합니다. 다시 시도하시기 바랍니다!");
    }

//////////////////////////////
}

function random(){
    return Math.floor((Math.random() * 10) + 1);
}  