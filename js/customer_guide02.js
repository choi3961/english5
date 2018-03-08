var url = "/xml/customer_guide.xml"; 
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
    var x = xmlDoc.getElementsByTagName("guide");     
    var customer_guide = x[0].children[0].children[0];

    var ns = new XMLSerializer();
    var guide= ns.serializeToString(customer_guide);

    document.getElementById("customer_guide").innerHTML = guide;

    //console.log(customer_guide);
}  

function random(){
    return Math.floor((Math.random() * 10) + 1);
}  
