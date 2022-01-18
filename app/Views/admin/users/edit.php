<div class="row">
    <div class="col-12 col-md-10 col-lg-6 col-xl-4 mt-4">
        <form method="post" action="<?php base_url('Admin/Admins/edit'.$edit['id']);?>">
            <div class="form-group row">
                <label class="col-3 col-form-label text-right">User name</label>
                <div class="col">
                    <input type="text" name="name"class="form-control" value="<?php echo $edit['name'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-3 col-form-label text-right">Passowrd</label>
                <div class="col">
                    <input type="text" name="password" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col offset-3">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="suspend" class="custom-control-input" id="show-on-menu" <?php echo $edit['suspend']?"checked":"";?>>
                        <label class="custom-control-label" for="show-on-menu">suspend</label>
                    </div>
                </div>
            </div>
            <div class="form-group row mt-5 py-3 px-2 bg-light">
                <div class="col my-auto">
                    <a href="<?php echo base_url('/Admin/Admins'); ?>" class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        Go back
                    </a>
                </div>
                <div class="col text-right">
                    <button class="btn btn-primary px-4" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>