<!DOCTYPE html>
<html>
  <head>
    <title>Kristanto Random Quotes</title>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="utama.css">

  </head>
  <body>
    <div class="jumbotron padding-keseluruhan transparan bagidua" id="content">
      <div id="tandakutip">
        <h1><i class="fa fa-quote-left"> </i></h1>
      </div>
      <div id="quote" class="message">
        <h4 id="isinyaquote" class="contentquote">Di depan senyummu aku malu-malu memandangmu, namun di depan Tuhanku aku terang-terangan memintamu. - #untukmuyangjauhdisana</h4>
      </div>
      <div class="col-xs-12 row text-center">
          <button id="sendTwitt" class="btn"><a id="sendtoTwitter" class="button" target="_blank"><i class="fa fa-twitter"></i></a></button>
          <button id="getQuote" class="btn">Get a quote</button> 
      </div>
    </div>

    <p class="footer text-center text-putih">by <a href="http://codepen.io/kristanto1" target="_blank" class="text-putih">Kristanto Andreas Sakul</a></p>
    <script type="text/javascript" src="jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
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
        //    $(this).attr("href", 'https://twitter.com/intent/tweet?text="' + $('.message').text() + " #quote" + "'");
        //  });

        $('#sendtoTwitter').click(function(){
            $(this).attr("href", 'https://twitter.com/intent/tweet?text="'+$('.message').text());
          });
          
      });
    </script>
  </body>
</html>