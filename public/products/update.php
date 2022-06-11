<?php

/** @var $pdo \PDO */
require_once '../../database.php';
require_once '../../functions.php';

$id = $_GET['id'] ?? null;
if(!$id) { header('Location: index.php'); exit;}
$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id',$id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

/*
echo'<pre>';
var_dump($product);
echo'</pre>';
*/

$errors = [];
$title = $product['title'];
$price = $product['price'];
$description = $product['description'];

  if($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once "../../validate_product.php";

    if(empty($errors)) {
        
        # Make an insert to the database of the superglobal $_POST data
        $statement = $pdo->prepare("UPDATE products SET title=:title, image=:image, description=:description, price=:price WHERE id = :id");
        # Make the change in the database
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':id', $id);
        $statement->execute();
        header('Location: index.php');
    }
  }

?>
    <?php include_once '../../views/partials/header.php'; ?>

    <p><a href="index.php" class="btn btn-secondary">Go Back To Products</a></p>

    <h1>Update Product <b><?php echo $product['title']; ?></b></h1>   

    <?php include_once '../../views/products/form.php' ?>

    <?php include_once '../../views/partials/footer.php' ?>