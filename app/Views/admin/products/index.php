<div class="row mt-3">
    <div class="col-12 text-right mb-2">
        <a href="<?php echo base_url('admin/products/add'); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Add new product
        </a>
    </div>
    <div class="col-12">
        <table class="table table-borderd table-striped">
            <thead class="bg-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Thumb</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Show on site</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                <td><?php echo $product['id']; ?></td>
                    <td>
                        <a href="#">
                            <img src="<?= base_url('assets/images/product').(string)$product['id'].'.png'; ?>" width="150px">
                        </a>
                    </td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['categorie_name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['sale_price']; ?></td>
                    <td><span class="text-success"><?php if ($product['enabled']) : ?>

                        <span class="text-success"><?php echo 'Yes'; ?></span>

                        <?php else : ?>

                        <span class="text-danger"><?php echo 'No'; ?></span>

                    <?php endif; ?></span></td>
                    <td>
                        <a href="<?php echo base_url('Admin/Products/edit/' . $product['id']); ?>" class="btn btn-warning" title="Edit this product">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?php echo base_url('Admin/Products/deleteRow/' . $product['id']); ?>" class="btn btn-danger" title="Delete this product">
                            <i class="fas fa-times"></i>
                        </a>
                    </td>
                </tr>
                
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>