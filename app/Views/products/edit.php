<h2>Edit Product</h2>

<form method="post" action="<?= base_url('products/update/' . $product->id) ?>" enctype="multipart/form-data">

  Name: 
  <input type="text" name="name" value="<?= $product->name ?>"><br><br>

  Description: 
  <textarea name="description"><?= $product->description ?></textarea><br><br>

  Quantity: 
  <input type="number" name="quantity" value="<?= $product->quantity ?>"><br><br>

  Price: 
  <input type="number" step="0.01" name="price" value="<?= $product->price ?>"><br><br>

  Current Image: <br>
  <?php if ($product->img): ?>
    <img src="/uploads/<?= $product->img ?>" width="80" height="80"><br><br>
  <?php else: ?>
    <p>No image uploaded yet.</p>
  <?php endif; ?>

  New Image: <input type="file" name="img"><br><br>

  <button type="submit">Update</button>
</form>
