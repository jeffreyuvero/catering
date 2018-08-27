<div class="container">
  <br>
  <div class="row">
      <div class="col-md-1">
         <button class="btn btn-primary btn-save-package" id="<?php echo $package_id ?>">Save</button>
      </div>
      <div class="col-md-2">
         <button class="btn btn-danger btn-clear-package" >Clear</button>
      </div>
  </div>
  <br>
  <div class="col-md-12">
     <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        <!-- Package Inclusion -->
        Dishes
      </div>
      <div class="card-body">
        <div class="row">
          <?php foreach ($dishes as $key => $dishe) { ?>
          <div class="col-md-4">
             <div class="card-text">
                  <div class="form-check">
                    <input 
                      type="checkbox" 
                      class="form-check-input " 
                      data-id = 0
                      name="<?php echo $dishe['name'] ?>" 
                      value="<?php echo $dishe['id'] ?>"
                      <?php  if(in_array($dishe['id'], $items_dishes_checker)){  ?>
                        checked
                      <?php  } ?>
                    >
                    <?php echo $dishe['name'] ?>
                  </div>
              </div>
          </div>
        <?php } ?>
        </div>
      </div>
      <div class="card-footer small text-muted">
        <!-- Updated yesterday at 11:59 PM -->
      </div>
    </div>
  </div>

   <div class="col-md-12">
     <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        <!-- Package Inclusion -->
        Services
      </div>
      <div class="card-body">
        <div class="row">
          <?php foreach ($services as $key => $service) { ?>
          <div class="col-md-4">
             <div class="card-text">
                  <div class="form-check">
                    <input 
                      type="checkbox" 
                      class="form-check-input " 
                      data-id = 1
                      name="<?php echo $service['name'] ?>" 
                      value="<?php echo $service['id'] ?>"
                      <?php  if(in_array($service['id'], $items_services_checker)){  ?>
                        checked
                      <?php  } ?>
                    >
                    <?php echo $service['name'] ?>
                  </div>
              </div>
          </div>
        <?php } ?>
        </div>
      </div>
      <div class="card-footer small text-muted">
        <!-- Updated yesterday at 11:59 PM -->
      </div>
    </div>
  </div>
</div>