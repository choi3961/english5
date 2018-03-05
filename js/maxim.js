
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
    var xmlDoc = xml.responseXML;
    var x = xmlDoc.getElementsByTagName("maxim");  
    var num = Math.floor((Math.random() * x.length) + 0);  
    var maxim = x[num].children[0].childNodes[0].nodeValue;
    document.getElementById("best_way").innerHTML = "<div title='추후 공개됩니다.'>수능 만점 로드맵</div>";
    document.getElementById("maxim").innerHTML = maxim;
    console.log(num);
}  

function random(){
    return Math.floor((Math.random() * 10) + 1);
}  
