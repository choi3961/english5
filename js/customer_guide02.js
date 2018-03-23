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
    var customer_guide02 = x[0].children[0].children[1];

    var ns = new XMLSerializer();
    var guide = ns.serializeToString(customer_guide);
    var guide02 = ns.serializeToString(customer_guide02);

    document.getElementById("customer_guide").innerHTML = guide + guide02;

    console.log(guide02);
}  

function random(){
    return Math.floor((Math.random() * 10) + 1);
}  
