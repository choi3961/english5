var url = "/xml/maxim.xml"; 
var lec = "";
fileRequest02(url, maxim_display);

function fileRequest02(url, display){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

          if(this.responseXML){
              display(this);   
          } 
          else alert("failed");
      }
    };
    xhttp.open("POST", url, true);
    xhttp.send();
}

function maxim_display(xml){
    maxim_display01(xml);
    maxim_display02(xml);
}  

function maxim_display01(xml){
    var xmlDoc = xml.responseXML;
    var x = xmlDoc.getElementsByTagName("maxim");  
    var num = Math.floor((Math.random() * x.length) + 0);  
    var maxim = x[num].children[0].childNodes[0].nodeValue;
    document.getElementById("best_way").innerHTML = "수능 영어 만점 로드맵";
    document.getElementById("maxim").innerHTML = maxim;
    document.getElementById("explain").innerHTML = "추후 공개됩니다.";
}  

function maxim_display02(xml){
    //alert("hello");
    //$("#maxim03").html("영어 잘할 수 있습니다.");
    $("#maxim03").animate({height: '2px'});
    $("#maxim03").css("background-color", "#6C9A99");
}  

function random(){
    return Math.floor((Math.random() * 10) + 1);
}  
