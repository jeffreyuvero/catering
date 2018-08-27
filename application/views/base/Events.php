<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
<!--     <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Transaction</li>
      <li class="breadcrumb-item active">Events</li>
      <li class="breadcrumb-item active">add-Ons</li>
    </ol> -->


    <h1>Events</h1>
    <hr>

    <!-- Date Settings -->
    <div class="row">
      <div class="col-sm-2">
          
      </div>

      <div class="col-sm-8">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <h2>Select Events</h2>
              </div>
              <hr />
              <div class="container">
                  <div class="row">
                    <div class="col-sm-6">
                      <?php foreach ($events as $key => $event) { ?>
                        <div class="card-text">
                            <div class="form-check">
                              <input type="radio" class="form-check-input" value = "<?php echo $event['name']; ?>" name="rdoEvents">
                              <?php echo ucfirst($event['name']); ?>
                            </div>
                        </div>
                       <?php  } ?>
                    </div>
                  </div>
              </div>
            </div>  
          </div>
      </div>

      <div class="col-sm-2">
                
      </div>

      <div class="col-sm-1">
      </div>
    </div>

    <!-- Add ons -->
    <div class="row">
      <div class="col-sm-2">
          
      </div>

      <div class="col-sm-8">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <h2>Add Ons</h2>
              </div>
              <hr />
              <?php foreach ($addons as $key => $addon) {?>
                  <div class="card-text">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="<?php echo $addon['addons_list']; ?>" value="<?php echo $addon['id']; ?>">
                        <?php echo ucfirst($addon['addons_list']); ?>
                      </div>
                  </div>
               <?php   } ?>
            </div>  
          </div>
      </div>

      <div class="col-sm-2">
                
      </div>



      <div class="col-sm-1">
      </div>
    </div>

    <!-- Date Settings -->
    

    <div class="row">
      <div class="col-sm-2">
          
      </div>

      <div class="col-sm-8">
          <div class="card">
            <div class="card-body">
              
              <div class="container">
                  <div class="row">
                    <div class="col-sm-6">
                      <button class="btn btn-primary btn-proceed">Proceed</button>
                    </div>
                  </div>
              </div>
            </div>  
          </div>
      </div>

      <div class="col-sm-2">
                
      </div>

      <div class="col-sm-1">
      </div>
    </div>



  </div>
  <!-- /.container-fluid -->
