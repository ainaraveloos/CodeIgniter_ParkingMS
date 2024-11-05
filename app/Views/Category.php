<?= $this->extend('Layout.php') ?>

<?= $this->section('Content') ?>
<?php if(session()->getFlashdata('add_cat')):?>
  <div class="alert alert-success mt-2">
      <?= session()->getFlashdata('add_cat') ?>
  </div>
<?php endif;?>
<?php if(session()->getFlashdata('edit_cat')):?>
  <div class="alert alert-success mt-2">
      <?= session()->getFlashdata('edit_cat') ?>
  </div>
<?php endif;?>
<?php if(session()->getFlashdata('delete_cat')):?>
  <div class="alert alert-success mt-2">
      <?= session()->getFlashdata('delete_cat') ?>
  </div>
<?php endif;?>
<div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-10 offset-1 mt-5 ">
            <div class="row">
              <!--Form section begin-->
                <div class="col-9 ml-1">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body mt-3">
                            <h2 class="h6 text-muted"><i class="fas fa-th-list"></i> &nbsp;Add Category</h2>
                            <!--Form begin-->
                            <form action="<?=base_url('/admin/create_category');?>" method="post" class="mt-4">
                            <!--Column input begin-->    
                            <div class="row mb-4">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="text-muted  m-0 p-0">Parking Area Number</label>
                                            <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control form-control-sm shadow-none" name="parking_area_no" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="text-muted  m-0 p-0">Vehicle Type</label>
                                            <input type="text" class="form-control form-control-sm shadow-none" name="vehicle_type" required>
                                        </div>
                                    </div>
                            </div>
                            <!--Column Input end-->
                            <!--Row Input begin-->
                                <div class="form-group mb-4">
                                  <label class="text-muted  m-0 p-0">Vehicle limit</label>
                                  <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" class="form-control form-control-sm shadow-none" name="vehicle_limit" required>
                                </div>
                                <div class="form-group mb-4">
                                  <label class="text-muted  m-0 p-0">Parking Charge</label>
                                  <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" class="form-control form-control-sm shadow-none" name="parking_charge" required>
                                </div>
                            <!--Row Input end-->
                            <!--Button validate begin -->
                                <div class="form-group mb-4">
                                    <input type="submit" name="send" class="btn text-white mt-4 btn-block shadow-none border-0 bg-success">
                                </div>
                            <!--Button validate end -->
                            </form>
                            <!--Form end-->
                        </div>
                    </div>
                </div>
              <!--Form section end-->
              <!--Details section begin-->
                <div class="col-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="text-muted h6"><b><i class="fas fa-universal-access"></i>&nbsp; Details:</b></h2>
                              <?php foreach ($category as $c):?>
                                <div class="mt-4">
                                  <div class="media-body">
                                    <?= $c['vehicle_type'];?>
                                    <p class="float-right"><i class="fas fa-dollar-sign"></i>&nbsp; <?=$c['parking_charge'];?></p>
                                  </div>
                                </div>
                              <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <!--Details section end-->
                <!--Category table (CRUD) begin-->
                <div class="col-12 mt-3 ml-2">
                  <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h2 class="h6 text-muted"><i class="fas fa-tasks"></i> &nbsp;Manage Category</h2>
                          <!-- Table begin-->
                          <table class="table table-striped rounded-3 p-3">
                            <!--Thead begin-->
                            <thead class="text-center ">
                              <tr class="bg-primary text-white">
                                <th><b>ID</b></th>
                                <th><b>Area NO</b></th>
                                <th><b>Vehicle Type</b></th>
                                <th><b>Vehicle Limit</b></th>
                                <th><b>Charge</b></th>
                                <th><b>Status</b></th>
                                <th><b>Action</b></th>
                              </tr>
                            </thead>
                            <!--Thead end-->
                            <!--Tbody begin -->
                            <tbody class="text-center">
                              <?php foreach($category as $c):?>
                                <tr  >
                                  <td ><?=$c['cat_id'];?></td>
                                  <td><?=$c['parking_area_no'];?></td>
                                  <td><?=$c['vehicle_type'];?></td>
                                  <td><?=$c['vehicle_limit'];?></td>
                                  <td><?=$c['parking_charge'];?></td>
                                  <td><?php if($c['status']=='0'):?>
                                        <a href="<?=base_url('/admin/status_active/'.$c['cat_id']);?>" class="btn btn-sm p-1 bg-success text-white shadow-none"><small>Available</small></a>
                                      <?php else:?>
                                        <a href="<?=base_url('/admin/status_deactive/'.$c['cat_id']);?>" class="btn btn-sm p-1 bg-danger text-white shadow-none"><small>Unavailable</small></a>
                                      <?php endif;?>
                                  </td>
                                  <td>
                                    <a href="#" class="confirm_link" data-url="<?= base_url('/admin/delete_category/'.$c['cat_id']);?>">
                                    <svg width="30" height="30" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#FF0000"  d="M14.7223 12.7585C14.7426 12.3448 14.4237 11.9929 14.01 11.9726C13.5963 11.9522 13.2444 12.2711 13.2241 12.6848L12.9999 17.2415C12.9796 17.6552 13.2985 18.0071 13.7122 18.0274C14.1259 18.0478 14.4778 17.7289 14.4981 17.3152L14.7223 12.7585Z" fill="#343C54"/>
                                        <path fill="#FF0000"  d="M9.98802 11.9726C9.5743 11.9929 9.25542 12.3448 9.27577 1.7585L9.49993 17.3152C9.52028 17.7289 9.87216 18.0478 10.2859 18.0274C10.6996 18.0071 11.0185 17.6552 10.9981 17.2415L10.774 12.6848C10.7536 12.2711 10.4017 11.9522 9.98802 11.9726Z" fill="#343C54"/>
                                        <path fill="#FF0000"  fill-rule="evenodd" clip-rule="evenodd" d="M10.249 2C9.00638 2 7.99902 3.00736 7.99902 4.25V5H5.5C4.25736 5 3.25 6.00736 3.25 7.25C3.25 8.28958 3.95503 9.16449 4.91303 9.42267L5.54076 19.8848C5.61205 21.0729 6.59642 22 7.78672 22H16.2113C17.4016 22 18.386 21.0729 18.4573 19.8848L19.085 9.42267C20.043 9.16449 20.748 8.28958 20.748 7.25C20.748 6.00736 19.7407 5 18.498 5H15.999V4.25C15.999 3.00736 14.9917 2 13.749 2H10.249ZM14.499 5V4.25C14.499 3.83579 14.1632 3.5 13.749 3.5H10.249C9.83481 3.5 9.49902 3.83579 9.49902 4.25V5H14.499ZM5.5 6.5C5.08579 6.5 4.75 6.83579 4.75 7.25C4.75 7.66421 5.08579 8 5.5 8H18.498C18.9123 8 19.248 7.66421 19.248 7.25C19.248 6.83579 18.9123 6.5 18.498 6.5H5.5ZM6.42037 9.5H17.5777L16.96 19.7949C16.9362 20.191 16.6081 20.5 16.2113 20.5H7.78672C7.38995 20.5 7.06183 20.191 7.03807 19.7949L6.42037 9.5Z" fill="#343C54"/>
                                    </svg>
                                    </a>
                                    <?= anchor_popup('/admin/edit_category/'.$c['cat_id'],'<i class="fas fa-edit fa-xs"></i>',['class'=>" btn fs-3 text-dark "]);?>
                                  </td>
                                </tr>
                              <?php endforeach;?>
                            </tbody>
                            <!--Tbody end -->           
                          </table>
                          <!--Table section end-->
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
</div>
<!-- Modale de confirmation -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to delete this parking category ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Confirm</button>
            </div>
        </div>
    </div>
</div>
<!--Script pour la confirmation de suppression-->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Sélectionne tous les liens avec la classe "confirm-link"
        const confirmLinks = document.querySelectorAll('.confirm_link');
        const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        let targetUrl = '';

        confirmLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault(); // Empêche la redirection par défaut
                targetUrl = this.getAttribute('data-url'); // Récupère l'URL cible

                // Affiche la modale de confirmation
                confirmModal.show();
            });
        });

        // Lorsqu'on clique sur "Confirmer" dans la modale
        document.getElementById('confirmDelete').addEventListener('click', function () {
            // Redirige vers l'URL cible
            window.location.href = targetUrl;
        });
    });
</script>
<?= $this->endSection() ?>