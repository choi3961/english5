	// URL parsing
	var path = location.pathname.substring(12,24);
	var first_part = "/videos";
	var last_part = ".mp4";

	var link = first_part + path + last_part;

	jwplayer("video").setup({ file: link, image: "/videos/squirrel.jpg", width: 990, height: 600 }); 