<?php
 session_start();
 //session_destroy();
 $array_php = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

	<div id="main">
		<div id="products">
			<!-- THIS SECTION WOULD BE DYNAMIC -->
			<?php
$product = array(
	array('a' => 0, 'id' => 101,'name' => "Basket Ball",'image' => "basketball.png",'price' => 150),
	array('a' => 1, 'id' => 102,'name' => "Football",'image' => "football.png",'price' => 120),
	array('a' => 2, 'id' => 103,'name' => "Soccer",'image' => "soccer.png",'price' => 90),
	array('a' => 3, 'id' => 104,'name' => "Table Tennis",'image' => "table-tennis.png",'price' => 110),
	array('a' => 4, 'id' => 105,'name' => "Tennis",'image' => "tennis.png",'price' => 80)
  );
$_SESSION['length'] = count($product);
echo '<div id="products">';
  $i = 0;
  foreach($product as $k => $v){
	echo '<div id="product-101" class="product">
	<img src="images/'.$v['image'].'">
	<h3 class="title"><a href="#">Product '.$v['id'].'</a></h3>
	<span>Price: $'.$v['price'].'</span>
	<input type="submit" value="add to cart" name="submit'.$i.'"> 
	<a class="add-to-cart" data-id=" '. $v['id'] .' " data-name="' . $v['name'] .' " data-image="' . $v['image'] . '" data-price="' . $v['price'] . '" >Add To Cart</a>
	</div>';
    $i++;
  }

  echo '</div>';
  ?>
			
			<!-- DYNAMIC SECTION ENDS HERE -->
		</div>
	</div>
	<div id="content" >

	</div>

	<div id="lastDiv">
		<button id="clearCart" >clear cart</button>
	</div>
</body>
</html>

<script>

$("#main").on("click", ".add-to-cart", function(event) {
		event.preventDefault();
		add2Cart($(this).data("id"), $(this).data("name"), $(this).data("image"), $(this).data("price"));
	});

function add2Cart(id ,name ,image ,price) {
	console.log('addtoacrt');
	$.ajax({
				url: 'function.php',
				type: 'post',
                data: {
					action: 'addToCart',
					id: id,
					name: name,
					image: image,
					price: price
                },
				datatype: 'json',
				success: function(data){
				 display(data);
				}
     		})
}

function display(x){

	document.getElementById("content").innerHTML = x;
}

</script>