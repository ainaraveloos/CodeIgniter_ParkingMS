<?= $this->extend('Layout') ?>

<?= $this->section('Content') ?>
<?php if(session()->getFlashdata('edit_success')):?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('edit_success') ?>
    </div>
<?php endif;?>
<div class="container-fluid ">
    <div class="row no-gutters">
        <div class="col-15  mt-5">
            <div class="row">
            <div class="col-6">
                <div class="card rounded-4 border-0 shadow-sm bg-primary text-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7"><br>
                                <h1 class="ml-2 text-white"><?= $vehicle_parked;?></h1>
                                <h6 class="my-3 text-white">Vehicles Parked</h6>
                            </div>
                            <div class="col-5"><br>
                                <ul class="ml-auto my-2">
                                    <i class="fas fa-parking fa-4x"></i>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
                <div class="col-6">
                    <div class="card rounded-4 border-0 shadow-sm bg-dark text-white">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7"><br>
                                    <h1 class="ml-2 text-white"><?= $vehicle_departed;?></h1>
                                    <h6 class="my-3 text-white">Departed Vehicles</h6>
                                </div>
                                <div class="col-5"><br>
                                    <ul class="ml-auto my-2">
                                        <i class="fas fa-car fa-4x"></i>
                                    </ul>
                              </div>
                          </div>
                       </div>
                       <br>
                   </div>
               </div>
               
               <div class="col-6">
                   <div class="card rounded-4 border-0 shadow-sm bg-danger text-white mt-4">
                       <div class="card-body">
                          <div class="row">
                              <div class="col-7"><br>
                                 <h1 class="ml-2 text-white"><?= $category_available;?></h1>
                                 <h6 class="my-3 text-white">Available Category</h6>
                              </div>
                              <div class="col-5"><br>
                                  <ul class="ml-auto my-2">
                                    <i class="fas fa-box fa-4x"></i>
                                  </ul>
                              </div>
                          </div>
                       </div>
                       <br>
                   </div>
               </div>
               <div class="col-6">
                   <div class="card rounded-4 border-0 shadow-sm bg-success text-white mt-4">
                       <div class="card-body">
                          <div class="row">
                              <div class="col-7">
                                 <br>
                                 <h1 class="ml-2 text-white"><i class="fas fa-dollar-sign fa-xs"></i>&nbsp;<?= $all_earings;?></h1>
                                 
                                 <h6 class="my-3 text-white">Total Earnings</h6>
                              </div>
                              <div class="col-5"><br>
                                  <ul class="ml-auto my-2">
                                    <i class="fas fa-money-check-alt fa-4x"></i>
                                  </ul>
                              </div>
                          </div>
                       </div>
                       <br>
                   </div>
               </div>
           </div> 

           <div class="row">
            <div class="col-6">
                <br>
             <div class="card rounded-4 border-0 shadow-sm bg-secondary text-white">
                 <div class="card-body">
                    <div class="row">
                        <div class="col-7"><br>
                           <h1 class="ml-2 text-white"><?= $all_records;?></h1>
                           <h6 class="my-3 text-white">Total Records</h6>
                        </div>
                        <div class="col-5"><br>
                            <ul class="ml-auto my-2">
                              <i class="fas fa-layer-group fa-4x"></i>
                            </ul>
                        </div>
                    </div>
                 </div>
                 <br>
             </div>
         </div>

               <div class="col-6">
                   <br>
                <div class="card rounded-4 border-0 shadow-sm bg-warning text-white">
                    <div class="card-body">
                       <div class="row">
                           <div class="col-7"><br>
                              <h1 class="ml-2 text-white">8</h1>
                              <h6 class="my-3 text-white">Total Parking Slots</h6>
                           </div>
                           <div class="col-5"><br>
                               <ul class="ml-auto my-2">
                                 <i class="fas fa-check-double fa-4x"></i>
                               </ul>
                           </div>
                       </div>
                    </div>
                    <br>
                </div>
            </div>

               
           </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>