<form class="row" method="post" action="<?php base_url('Admin/Products/add');?> "enctype="multipart/form-data">
    <div class="col-12 col-md-10 col-lg-8 mt-4">
        <div class="form-group row">
            <label for="product-name" class="col-2 col-form-label text-right required">Product name</label>
            <div class="col">
                <input type="text" name="name" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label text-right">Description</label>
            <div class="col">
                <textarea class="form-control" name="description" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="product-price" class="col-2 col-form-label text-right required">Price</label>
            <div class="col">
                <input type="text" name="price" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="product-sale-price" class="col-2 col-form-label text-right required">Sale price</label>
            <div class="col">
                <input type="text" name="sale_price" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="product-image" class="col-2 col-form-label text-right required">Image</label>
            <div class="col-10">
                <div class="input-group">
                    
                    <div class="input-group-append">
                    <input class="form-control form-control-lg" name="image" id="file-browser" type="file"  accept="image/*">
                   
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="product-category" class="col-2 col-form-label text-right required">Category</label>
            <div class="col">
                <select class="form-control" name="categorie_id">
                <?php foreach ($categories as $categorie) : ?>
                    <option value=<?php echo $categorie['id']; ?>><?php echo $categorie['name']; ?></option>
                   
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="product-sort-order" class="col-2 col-form-label text-right">Sort order</label>
            <div class="col">
                <input type="text" name ="order" class="form-control" min="0" max="99">
            </div>
        </div>
        <div class="form-group row">
            <div class="col offset-2">
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="enabled" class="custom-control-input" id="show-on-site" checked>
                    <label class="custom-control-label" for="show-on-site">Show on site</label>
                </div>
            </div>
        </div>
        <div class="form-group row mt-5 bg-light py-4 px-2">
            <div class="col">
                <a href="<?php echo base_url('/Admin/Products'); ?>" class="btn btn-outline-secondary">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    Go back
                </a>
            </div>
            <div class="col text-right">
                <button class="btn btn-primary px-4" type="submit">Save</button>
            </div>
        </div>
    </div>
</form>