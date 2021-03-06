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


    <h1>Billing Statement</h1>
    <hr>
      <div class="row">
        <div class="col-sm-2"> </div>

        <div class="col-sm-8">
          <div class="card border-light mb-3 style="max-width: 18rem;">
            <div class="card-header">
                <h4>
                  <i>Billing Statement</i>
                </h4>
                <p>
                  <!-- <i style="color: red"> Please check your item before you proceed! </i> -->
                </p>
            </div>
            <div class="card-body">
              <div class="container">
                <div class="container">
                  <div class="row">
                    <label class="col-sm-2 summary_label">
                      Name: 
                    </label>
                    <p class="col-sm-2">
                      <strong>
                        <?php echo $order_summary['last_name'] .', '. $order_summary['first_name']  ?> 
                      </strong> 
                    </p>
                    <label class="col-sm-3 summary_label">
                      Transaction Date: 
                    </label>
                    <p class="col-sm-2">
                      <strong>
                          <?php echo $transaction_date  ?> 
                      </strong> 
                    </p>
                  </div>

                  <div class="row">
                    <label class="col-sm-2 summary_label">
                      Email: 
                    </label>
                    <p class="col-sm-2">
                      <strong>
                         <?php echo $order_summary['email'] ?> 
                      </strong>
                    </p>
                    <label class="col-sm-3 summary_label">
                      Total Amount 
                    </label>
                    <p class="col-sm-2">
                       <strong><?php echo $total_amount; ?></strong>
                    </p>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                      <div class="container">
                        <h6>
                              Summary of your transaction
                        </h6>
                      </div>
                    </div>
                    <div class="container">
                      <div class="row">
                        <label class="col-sm-4">
                          Events: 
                        </label>
                        <p class="col-sm-2">
                          <strong>
                             <?php echo $order_summary['event'] ?> 
                          </strong>
                        </p>
                      </div>

                      <label class="col-sm-4">
                        Add ons (if any): 
                      </label>
                       <?php foreach ($addons as $key => $item) { ?> 
                        <div class="row">
                          <label class="col-sm-4"> <strong>Item:</strong> </label>
                          <p class="col-sm-2">
                            <?php echo $item['addons_list'] ?>
                            </p>
                          <label class="col-sm-4"> <strong>Price:</strong> </label>
                          <p class="col-sm-2">
                            <?php echo $item['price'] ?>
                            </p>
                        </div>
                      <?php  } ?> 

                      <div class="row">
                        <label class="col-sm-4">
                          <strong>Selected Package</strong> 
                        </label>
                        <p class="col-sm-2">
                          <?php echo $package['package']; ?>
                          </p>
                        <label class="col-sm-4">
                          Price: 
                        </label>
                        <p class="col-sm-2">
                          <?php echo $package['price']; ?>
                          </p>
                      </div>

                      <div class="row  alert alert-danger">
                        <label class="col-sm-4">
                          <strong>TOTAL AMOUNT</strong> 
                        </label>
                        <p class="col-sm-2">

                        </p>
                        <label class="col-sm-4">
                        </label>
                        <p class="col-sm-2">
                           <strong><?php echo $total_amount; ?></strong>
                        </p>
                      </div>  
                    </div>
                  
                </div>
              </div>
            </div>  
          </div>
        </div>

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
                              <button class="btn btn-primary btn-proceed-bill_statement">
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
