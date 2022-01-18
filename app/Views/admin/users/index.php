<div class="row mt-3">
    <div class="col-12 text-right mb-2">
        <a href="<?php echo base_url('Admin/Admins/add/' ); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Add new admin
        </a>
    </div>
    <div class="col-12">
        <table class="table table-bordered table-striped">
            <thead class="bg-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    
                    <th>Susbended</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                   
                   
                    <td><span class="text-success"><?php if (!$user['suspend']) : ?>

                    <span class="text-success"><?php echo 'No'; ?></span>

                    <?php else : ?> 

                    <span class="text-danger"><?php echo 'Yes'; ?></span>

                    <?php endif; ?></span></td>
                    <td>
                        <a href="<?php echo base_url('Admin/Admins/edit/' . $user['id']); ?>" class="btn btn-warning" title="Edit this category">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?php echo base_url('Admin/Admins/deleteRow/' . $user['id']); ?>" class="btn btn-danger" title="Delete this category">
                            <i class="fas fa-times"></i>
                        </a>
                    </td>
                </tr>
                
                    
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>