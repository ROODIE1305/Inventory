<h2>Add Product</h2>
<form method="post" action="<?= base_url('products/store') ?>" enctype="multipart/form-data">

  Name: <input type="text" name="name"><br>
  Description: <textarea name="description"></textarea><br>
  Quantity: <input type="number" name="quantity"><br>
  Price: <input type="number" step="0.01" name="price"><br>
  Image: <input type="file" name="img"><br>
  <button type="submit">Save</button>
</form>
