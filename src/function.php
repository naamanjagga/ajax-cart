<?php
  session_start();
   //session_destroy();
  if(!isset($_SESSION['add'])){
    $_SESSION['add'] = array();
  }
?>
<?
  if(isset($_POST['action']) && $_POST['action']== "addToCart") {

      $id = $_POST['id'];
      $name = $_POST['name'];
      $image = $_POST['image'];
      $price = $_POST['price'];
      $quantity = 1;
      $array1 = array($id ,$name ,$image ,$price ,$quantity);
       array_push( $_SESSION['add'] , $array1 );
      
      echo '<table>';
      foreach($_SESSION['add'] as $key => $value) {
            echo '<tr><td>'.$value[0].'</td>';
            echo '<td>'.$value[1].'</td>';
            echo '<td>'.$value[2].'</td>';
            echo '<td>'.$value[3].'</td>';
            echo '<td>'.$value[4].'</td>';
            echo '<td><input type="text" name="text"></td>';
            echo '<td><input type="submit" name="edit" value="Edit"></td>';
            echo '<td><input type="submit" name="del" value="Delete"></td>';
      }
      echo '</table>';
  }
  //print_r($_SESSION['add']);

?>