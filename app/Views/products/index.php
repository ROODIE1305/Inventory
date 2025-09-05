<h2>Products</h2>
<a href="<?= base_url('products/create') ?>">Add Product</a>
<table border="1">
  <tr><th>ID</th><th>Image</th><th>Name</th><th>Description</th><th>Quantity</th><th>Price</th><th>Action</th></tr>
  <?php foreach ($products as $p): ?>
    <tr>
      <td><?= $p->id ?></td>
      <td>
  <?php if ($p->img): ?>
    <img src="/uploads/<?= $p->img ?>" width="80">
  <?php else: ?>
    No Image
  <?php endif; ?>
</td>
      <td><?= $p->name ?></td>
      <td><?= $p->description ?></td>
      <td><?= $p->quantity ?></td>
      <td><?= $p->price ?></td>
      
        <td>
  <a href="<?= base_url('products/edit/' . $p->id) ?>">Edit</a>
<a href="<?= base_url('products/delete/' . $p->id) ?>" onclick="return confirm('Are you sure?')">Delete</a>


      </td>
    </tr>
  <?php endforeach; ?>
</table>
