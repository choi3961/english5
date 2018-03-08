	// URL parsing
	//var path = location.pathname.substring(12,24);
	//var first_part = "/videos";
	//var last_part = ".mp4";

	//var link2 = first_part + path + last_part;

	var bucket = "https://s3.ap-northeast-2.amazonaws.com/english002";
	var file = location.pathname.substring(12,24);
	var last_part = ".mp4";

	var link = bucket + file +last_part;

	jwplayer("video").setup({ file: link, image: "/videos/squirrel.jpg", width: 990, height: 600 }); 