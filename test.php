<?php 
require ('connection.php');
?>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="overlay.js"></script>
  <link rel="stylesheet" type="text/css" href="overlay.css">
  <script type="text/javascript">
				$(document).ready(function(){
  				$("#Pancake").click(function(){
    				$(".Waffle").hide();
    				$(".Milkshake").hide();
    				$(".main").hide();
    				$(".Pancake").show();
  				});
  				$("#Waffle").click(function(){
    				$(".Waffle").show();
    				$(".Milkshake").hide();
    				$(".main").hide();
    				$(".Pancake").hide();
  				});
  				$("#Milkshake").click(function(){
    				$(".Waffle").hide();
    				$(".Milkshake").show();
    				$(".main").hide();
    				$(".Pancake").hide();
  				});
  				$("#All").click(function(){
    				$(".Waffle").show();
    				$(".Milkshake").show();
    				$(".main").show();
    				$(".Pancake").show();
  				});
				});
			</script>
  <style type="text/css">
  	.box{
  		border: 5px solid black;
  		margin: 50px;
  		padding: 50px;
  	}
    .box1{ 
      background-color: black; 
      border: 5px solid white;
      color: white;
      margin: 50px;
      padding: 50px;
    }
  </style>
</head>
<body>
	<div class="container">
		  <?php 
  require ('connection.php');
  $sql="select * from items";
  $rs=$db->query($sql);
  while($row=$rs->fetch(PDO::FETCH_OBJ)){
  ?>
		<div class="box selected <?php echo $row->category?>" >
			<div class="row">
				<div class="col-md-6"><h1><?php echo $row->name?></h1></div>
        <div class="col-md-6"><button onclick="on(<?php echo $row->id?>)">on</button></div>
			</div>	
		</div>
    <div id="overlay" class="overlay">
      <div class="container"> 
        <div class="box1 selected <?php echo $row->category?>" style="margin-top: 200px;">
        <div class="row">
          <div class="col-md-6"><h1><?php echo $row->name?></h1></div>
          <div class="col-md-6"><button onclick="off(<?php echo $row->id?>)">off</button></div>
        </div>  
        </div>
      </div>
    </div>
    <?php }?>
		<div class="row">
			<div class="col-md-12">
				<a href="#Pancake" id="Pancake" onclick="Pancake()">Pancake</a>
				<button onclick="Milkshake()" id="Milkshake">Milkshake</button>
				<button onclick="Waffle()" id="Waffle">Waffle</button>
				<button onclick="All()" id="All">ALL</button>
			</div>
		</div>
	</div>
</body>