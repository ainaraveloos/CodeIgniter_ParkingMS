<?= $this->extend('Layout.php') ?>

<?= $this->section('Content') ?>
<!--List of vehicle-->
<div class="col-11  mt-3 ml-5">
                  <div class="card border-0 shadow-none offset-1">
                    <div class="card-body">
                      <h2 class="h6 text-muted"><i class="fas fa-receipt"></i>&nbsp; Receipts</h2>

                      <div class="d-flex justify-content-center mt-4">
                          <?= $pager->links('vehicle', 'bootstrap_pagination') ?>
                      </div>

                      <table class="table mt-4 border-2 table-striped">
                        <thead class="text-center">
                          <tr class="bg-primary text-white">
                            <th><b>ID</b></th>
                            <th><b>Vehicle Number</b></th>
                            <th><b>Area Number</b></th>
                            <th><b>Arrival Time</b></th>
                            <th><b>Status</b></th>
                            <th><b>Action</b></th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          <?php foreach($vehicles as $a):?>
                          <tr>
                            <td><?= $a['id'];?></td>
                            <td><?= $a['vehicle_no'];?></td>
                            <td><?= $a['parking_area_no'];?></td>
                            <td><?= $a['arrival_time'];?></td>
                            <td><?php if($a['status']==0):?>
                                    <a href="<?=base_url('/admin/unparked/'.$a['id'])?>"><p class="btn btn-sm  p-1 btn-success text-white shadow-none"><b>Parked</b></p></a>
                                  <?php else:?>
                                    <a href="<?=base_url('/admin/parked/'.$a['id'])?>"><p class="btn btn-sm p-1 btn-danger text-white shadow-none"><b>Departured</b></p></a>                                       
                                  <?php endif;?></small>
                            </td>
                            <td><?= anchor_popup('/admin/receipt/'.$a['id'],'&nbsp; <i class="fas fa-eye fa-xs text-primary" width="65" height="65"></i> &nbsp;',['class'=>"display-6 shadow-none"]);?></td>
                          </tr>
                          <?php endforeach;?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
<?= $this->endSection() ?>