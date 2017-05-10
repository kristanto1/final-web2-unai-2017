<!DOCTYPE html>
<html>
<head>
	<title>Kristanto Wikipedia Viewer</title>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="utama.css">

</head>
<body>
	<div class="tengah">
	  <a href="https://en.wikipedia.org/wiki/Special:Random" class="textputih" target="_blank">click here for a random article</a>
	</div>
	<div class="tengah">
	  <center>
	  <button id="wikibtn" onclick="showonclick()" class="tengah">
	    <i class="fa fa-search tengah" aria-hidden="true"></i>
	  </button>
	  </center>
	</div>
	<div id="wikicari" style="display:none" class="tengah">
	  <input type="text" id="fn" name="myText">
	  <button id="wikitombolcari">Cari</button>
	  <button id="wikihide" onclick="hideonclick()">x</button>
	</div>
	<div class="tengah">
	  <p class="textputih"> 
	    click icon to search
	  </p>
	</div>
	<div id="hasilwiki"></div>

	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript">
		function showonclick(){ 
		  document.getElementById("wikicari").style.display='block'; 
		  document.getElementById("wikibtn").style.display='none';

		}

		function hideonclick(){
		  document.getElementById("wikicari").style.display='none';
		  document.getElementById("wikibtn").style.display='block';
		}

		$("#wikitombolcari").on("click", function(){
		  var cari = $("#fn").val();
		  console.log(cari);
		  var url = "http://en.wikipedia.org/w/api.php?action=opensearch&search=" + cari + "&format=json&callback=?";
		  $.ajax({
		    url: url,
		    type: "GET",
		    async: false,
		    dataType: "json",
		    success: function(data, status, jqXHR){
		      console.log(data);
		      for(var i=0; i<data[1].length; i++){
		        $("#hasilwiki").prepend(
		          "<div><div class='well'><a href="+data[3][i]+" target='_blank'><h2>" + data[1][i]+"</h2>"+"<p>" + data[2][i]+"</p></a></div></div>"
		        );
		        
		      }
		    }
		  })
		})
	</script>
</body>
</html>