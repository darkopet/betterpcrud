
  <?php if(!empty($errors)): ?>
      <div class="alert alert-danger"> 
        <?php foreach($errors as $error) : ?>
          <div> <?php echo $error ?> </div>
        <?php endforeach; ?>  
      </div>
  <?php endif; ?>


  <form action="" method="post" enctype="multipart/form-data">

        <?php if ($product['image']): ?>
            <img src="/<?php echo $product['image'] ?>" class="update-image">            
        <?php endif; ?>

        <div class="form-group">
            <label>Product Image</label>
            <br>
            <input type="file" name="image">
            <br><br>
        </div>
        <div class="form-group">
            <label>Product Title</label>
            <input type="text" name="title" value="<?php echo $title ?>" class="form-control">
            <br>
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea type="text" name="description" class="form-control"><?php echo $description ?></textarea>
            <br>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="number" name="price" value="<?php echo $price ?>" step=".01" class="form-control">
            <br>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>