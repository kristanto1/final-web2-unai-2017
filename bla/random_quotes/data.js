$(document).ready(function(){
$("#getQuote").on('click',function(){
  var x = Math.floor(Math.random() * 256); // range is 0-255
	var y = Math.floor(Math.random() * 256);
	var z = Math.floor(Math.random() * 256);
	var thergb = "rgb(" + x + "," + y + "," + z + ")"; 
	console.log(thergb,document.body.style.background);
	document.body.style.background=thergb;
  
  $.ajaxSetup ({cache:false});
  $.getJSON("http://quotesondesign.com/wp-json/posts?filter[orderby]=rand&callback=", function(data) {
    $(".message").html(data[0].content + " — " + data[0].title)
  });
});

//$('#sendtoTwitter').click(function(){
//		$(this).attr("href", 'https://twitter.com/intent/tweet?text="' + $('.message').text() + " #quote" + "'");
//	});

$('#sendtoTwitter').click(function(){
		$(this).attr("href", 'https://twitter.com/intent/tweet?text="'+$('.message').text());
	});
  
});