console.log(navigator.userAgent);

var str = navigator.userAgent;
var patt = /chrome/i;
var patt2 = /Firefox/i;

var result = patt.test(str);

var result2 = patt2.test(str);

if (result === true || result2 === true) {
	//alert("올바른 브라우저입니다.");
}
else
	alert("구글 크롬이나 Firefox 브라우저를  사용하십시오");
