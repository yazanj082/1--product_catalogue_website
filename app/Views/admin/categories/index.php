<div class="row mt-3">
    <div class="col-12 text-right mb-2">
        <a href="<?php echo base_url('Admin/Categories/add/' ); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Add new category
        </a>
    </div>
    <div class="col-12">
        <table class="table table-bordered table-striped">
            <thead class="bg-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Sort order</th>
                    <th>Show on menu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $categorie) : ?>
                <tr>
                    <td><?php echo $categorie['id']; ?></td>
                    <td><?php echo $categorie['name']; ?></td>
                    <td><?php echo $categorie['order']; ?></td>
                    <td><span class="text-success"><?php if ($categorie['enabled']) : ?>

                    <span class="text-success"><?php echo 'Enabled'; ?></span>

                    <?php else : ?>

                    <span class="text-danger"><?php echo 'Disabled'; ?></span>

                    <?php endif; ?></span></td>
                    <td>
                        <a href="<?php echo base_url('Admin/Categories/edit/' . $categorie['id']); ?>" class="btn btn-warning" title="Edit this category">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?php echo base_url('Admin/Categories/deleteRow/' . $categorie['id']); ?>" class="btn btn-danger" title="Delete this category">
                            <i class="fas fa-times"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
</div>