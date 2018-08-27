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
       <div class="row">
         <div class="col-sm-2">
             
         </div>

         <div class="col-sm-8">
             <div class="card">
               <div class="card-body">
                 <div class="card-title">
                   <h2>Set the date</h2>
                 </div>
                 <hr />
                 <div class="container">
                     <div class="row">
                       <div class="col-sm-6">
                         <!-- <div class="input-group-date" id="datetimepicker5">
                           <input type="text" class="form-control" name="" />
                             <span class="input-group-addon"></span>
                             <span class="glyphicon glyphicon-calendar"></span>
                         </div> -->
                         <!-- <div class="inpu-append date" id="pd3" data-date="12-02-2012" data-date-format ="dd-mm-yyyy">
                           <input type="text" class="span2" value="12-02-2012" >
                           <span class="add-on"><i class="icon-th"></i></span>
                         </div> -->

                        <input type="text" id="datepicker" placeholder="yyyy-mm-dd">
                       <!--   <div class="docs-datepicker">
                          <div class="input-group">
                            <input type="text" class="form-control docs-date" name="date" placeholder="Pick a date">
                            <div class="input-group-append">
                              <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled>
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                              </button>
                            </div>
                          </div></div>

    -->

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

      <div class="row">
        <div class="col-sm-2"> </div>
       <?php foreach ($packages as $key => $package) { ?>
           <div class="col-sm-4">
              <div class="card border-light mb-3 style="max-width: 18rem;">
                <div class="card-header">
                    <h4>
                      <i> <?php echo ucfirst($package['package']);  ?></i>
                    </h4>
                </div>
                <div class="card-body">
                  <div class="container">
                    <ul>
                        
                      <?php foreach ($lists as $key => $list) { ?>
                          <?php foreach ($list as $key => $_list) { ?>
                              <li><p><?php echo ucfirst($_list['name']);  ?></p></li>
                          <?php } ?>
                      <?php } ?>
                    </ul>
                    <div class="form-check">
                      <input type="radio" class="form-check-input" value = " <?php echo ucfirst($package['id']);  ?>" name="rdoPackage">
                      Click here to select the package
                    </div>
                  </div>
                </div>  
              </div>
            </div>
       <?php } ?>
<!--         <div class="col-sm-4">
          <div class="card border-light mb-3 style="max-width: 18rem;">
            <div class="card-header">
                <h4>
                  <i>Package B</i>
                </h4>
            </div>
            <div class="card-body">
              <div class="container">
                <ul>
                  <li><p>Hotatai Soup</p></li>
                  <li><p>Mixed Green Salad</p></li>
                  <li><p>Soy Chicken</p></li>
                  <li><p>Sweet and Sour Pork</p></li>
                  <li><p>Beep Broccoli</p></li>
                  <li><p>Fish Fillet woth Tausi</p></li>
                  <li><p>Birthday Noodles</p></li>
                  <li><p>Salt and Pepper Tofu</p></li>
                  <li><p>Ice Tea Unlimited</p></li>
                </ul>
                <div class="form-check">
                  <input type="radio" class="form-check-input" value = "2" name="rdoPackage">
                  Click here to select the package
                </div>
              </div>
            </div>  
          </div>
        </div> -->

        <div class="col-sm-2"></div>
        <div class="col-sm-1"></div>
      </div>
  
    <div class="row">
      <div class="col-sm-2"></div>

      <div class="col-sm-8">
          <div class="card">
              <div class="card-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-sm-6">
                              <button class="btn btn-primary btn-proceed-package">
                                Proceed
                              </button>
                          </div>
                      </div>
                  </div>
              </div>  
          </div>
      </div>

      <div class="col-sm-2"></div>
      <div class="col-sm-1"></div>
    </div>



  </div>
  <!-- /.container-fluid -->
