<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
$( '#login' ).on( 'click', function(){
  $.ajax({
    url: 'dbsetup/initial-setup.php',
    success: function(data) {
      console.log(data);
      if( data == -1 ) {
        setup();
      }
    }
    })
  });
$( '#signup' ).on( 'click', function(){
  $.ajax({
    url: 'dbsetup/initial-setup.php',
    success: function(data) {
      if( data == -1 ) {
          setup();
      }
    }
    })
  });
  function setup() {
    if ($.trim($('.setup').html())==''){
      $('.btn').addClass( 'disabled' );
      $( '#color' ).css( 'background', '#eee')
      $( '.setup' ).append( $( '<h1 class="center">Databases are not yet setup</h1>' ) )
                  .append( $( '<p class="center"> <strong>please setup database</strong></p>' ) )
                  .append( $( '<p class="center">You need to be admin to setup database</p>' ) )
                  .append( $( `<button onclick="gotofile()" class="btn btn-primary btn-md center-block" style="width: 150px;">
                          Login as admin</button>`) );
    }
  }
});
function gotofile(){
	window.location = "login.php";
}
</script>
<style>
#login,
#signup{
    display: inline-block;
    vertical-align: top;
}
.center {
  text-align: center;
}
#color {
  background: #ffffff;
}
</style>
</head>
<body>
  <div class="container">
    <br><br>
  <div class="jumbotron">
    <h1 style="text-align: center;"> Welcome to Parent Portal </h1>
    <br>
    <div class="col-sm-12 text-center">
      <button id="login" class="btn btn-primary btn-md center-block" Style="width: 150px;" >Login</button>
      <button id="signup" class="btn btn-primary btn-md center-block" Style="width: 150px;">Signup</button>
    </div>
    <br>
  </div>
  <div class="jumbotron" id="color">
    <div class="setup">
    </div>
  </div>
  </div>
</body>
</html>
