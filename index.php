<?php 
include("config.php"); 
include("login.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-comment"></span> Chat
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-refresh">
                                </span>Refresh</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-ok-sign">
                                </span>Available</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-remove">
                                </span>Busy</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-time"></span>
                                    Away</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span>
                                    Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul class="chat">
                            <?php
                              if(isset($_SESSION['user'])){
                                include("chatbox.php");
                              }else{
                                $display_case=true;
                                include("login.php");
                              }
                            ?>
                </div>
              </div>
            </div>
          </div>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="chat.js"></script>
  <script language="JavaScript" type="text/javascript">
function bajar(){
scrollTo(0,document.body.scrollHeight)
}
window.onload=bajar
</script>
  </body>
</html>
<!-- 
<!DOCTYPE html>
<html>
 <head>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="chat.js"></script>
  <link href="chat.css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <title>PHP Group Chat With jQuery & AJAX</title>
 </head>
 <body>
  <div id="content container" style="margin-top:10px;height:100%;">
   <center><h1>Group Chat In PHP</h1></center>
     <div class="chat">
      <div class="users">
       // <?php include("users.php");?>
      </div>
      <div class="chatbox">
       // <?php
       // if(isset($_SESSION['user'])){
        // include("chatbox.php");
       // }else{
        // $display_case=true;
        // include("login.php");
       // }
       // ?>
      </div>
     </div>
  </div>
 </body>
</html> -->