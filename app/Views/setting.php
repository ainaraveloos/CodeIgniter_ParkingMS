<?= $this->extend('Layout');?>

<?= $this->section('Content');?>


<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-3" style="position:fixed">
        </div>
        <div class="col-9 offset-2  mt-5">
            <div class="row">
                <div class="col-12 ">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body mt-4">
                            <h2 class="h6 text-muted"><i class="fas fa-cog"></i> &nbsp;Change Your Password</h2>
                            
                            <form action="<?=base_url('/admin/setting');?>" method="post" class="mt-4">
                                <div class="form-group container-fluid mb-4">
                                    <label class=" m-0 p-0 text-muted">Current Password</label>
                                    <input type="password" name="current_password" class="form-control form-control-sm shadow-none"  autofocus>
                                </div>
                                <?php if(session()->getFlashdata('wrong_pass')):?>
                                    <div class="alert alert-warning">
                                        <?= session()->getFlashdata('wrong_pass') ?>
                                    </div>
                                <?php endif;?>
                                <div class="form-group container-fluid mb-4">
                                    <label class=" m-0 p-0 text-muted">New Password</label>
                                    <input type="password" name="new_password" class="form-control form-control-sm shadow-none">
                                </div>
                                <div class="form-group container-fluid mb-4">
                                    <label class=" m-0 p-0 text-muted">Re enter Password</label>
                                    <input type="password" name="reenter_password" class="form-control form-control-sm shadow-none">
                                </div>

                                <?php if (isset($validation)): ?>
                                    <div class="alert alert-danger" >
                                        <?= $validation->listErrors() ?>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group text-center container-fluid">
                                    <input type="submit" name="send" class="btn btn-block bg-success text-white shadow-none mt-4 text-center" value="Change Password">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection();?>