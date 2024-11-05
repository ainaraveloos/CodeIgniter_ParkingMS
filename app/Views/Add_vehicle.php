<?= $this->extend('Layout.php') ?>

<?= $this->section('Content') ?>
<?php if(session()->getFlashdata('add_vehicle')):?>
  <div class="alert alert-success mt-2">
      <?= session()->getFlashdata('add_vehicle') ?>
  </div>
<?php endif;?>
<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-10 offset-1 mt-5">
            <div class="row">
                <div class="col-9 ml-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body mt-3">
                            <h2 class="h6 text-muted"><i class="fas fa-file-import"></i> &nbsp;Add Vehicle</h2>
                              <!--Form section begin -->
                              <form action="<?= base_url('/admin/add_vehicle');?>" method="post" class="mt-4">
                                <!--Column Input begin-->
                                <div class="row">
                                  <!--Vehicle Number begin-->
                                  <div class="col-6 mb-4">
                                    <div class="form-group">
                                      <label for="" class=" m-0 p-0 text-muted">Vehicle Number</label>
                                      <input type="text" class="form-control form-control-sm shadow-none" name="vehicle_number" required autofocus>
                                    </div>
                                  </div>
                                  <!--Vehicle Number end-->
                                  <!--Vehicle Type begin-->
                                  <div class="col-6">
                                    <div class="form-group">
                                      <label for="" class=" m-0 p-0 text-muted">Vehicle Type</label>
                                      <select name="vehicle_type" class="form-control form-control-sm shadow-none" required>
                                        <option value="" selected disabled>Select Vehicle Type</option>
                                          <?php foreach($vehicleData as $data):?>
                                            <option value="<?=esc($data['vehicle_type']);?>" <?php if(esc($data['parked_vehicles']==esc($data['vehicle_limit']))){echo "disabled";}?>><?=esc($data['vehicle_type']);?></option>
                                          <?php endforeach;?>
                                      </select>
                                    </div>
                                  </div>
                                  <!--vehicle Type end-->
                                </div>
                                <!--Column Input end-->
                                <!--Row Input begin-->
                                <div class="form-group mb-4">
                                  <!--Parking Area Number begin-->
                                  <label for="" class=" m-0 p-0 text-muted">Parking Area Number</label>
                                    <select name="parking_area_no" class="form-control form-control-sm shadow-none" required>
                                      <option value="" selected disabled>Select Parking Area Number</option>
                                      <?php foreach($vehicleData as $p):?>
                                        <option  value="<?=esc($p['parking_area_no']);?>" <?php if(esc($data['parked_vehicles']==esc($data['vehicle_limit']))){echo "disabled";}?>><?=esc($p['parking_area_no']);?> &#8594; <span>(<?=esc($p['vehicle_type']);?>)</span></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>
                                <!--Parking Area Number end-->
                                <!--parking Charge begin-->
                                <div class="form-group mb-4">
                                    <label for="" class=" m-0 p-0 text-muted">Parking Charge</label>
                                    <select name="parking_charge" class="form-control form-control-sm shadow-none" required>
                                        <option value="" selected disabled>Select Parking Charge</option>
                                        <?php foreach($vehicleData as $p):?>
                                        <option value="<?=esc($p['parking_charge']);?>" <?php if(esc($p['parked_vehicles']==esc($p['vehicle_limit']))){echo "disabled";}?>>$<?=esc($p['parking_charge']);?> &#8594; <span>(<?=esc($p['vehicle_type']);?>)</span></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <!--Parking Charge end-->
                                <div class="form-group mb-4">
                                    <input type="submit" value="Add Vehicle" class="mt-4 btn btn-block bg-success text-white shadow-none">
                                </div>
                            </form>
                            <!-- Form section end-->
                        </div>
                    </div>
                </div>
                <!--Limit Section begin-->
                <div class="col-3">
                  <div class="card border-0 shadow-sm">
                    <div class="card-body">
                      <h2 class="text-muted h6 "><b><i class="fab fa-staylinked fa-xs"></i>&nbsp; Vehicle Limitations</b></h2>
                        <?php foreach ($vehicleData as $c):?>
                          <div class="mt-4">
                            <div class="media-body">
                              <?= esc($c['vehicle_type']);?><br>
                              <b>Limit: </b>
                              <?php if(esc($c['available_spots'])==0):?>
                                <span class='badge bg-danger'><?= esc($c['available_spots']);?></span> 
                              <?php else:?>
                                <span class='badge bg-success'><?= esc($c['available_spots']);?></span>
                              <?php endif;?>
                              out of <?=esc($c['vehicle_limit']);?>
                            </div>
                          </div>
                        <?php endforeach;?> 
                    </div>
                  </div>
                </div>
                <!--Limit Section end-->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>