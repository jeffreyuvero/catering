<div id="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumbs-->
<!--       <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
        </li> -->
        <!-- <li class="breadcrumb-item active"></li>
      </ol> -->

    <!-- Page Content -->
      <div class="container">
            <!-- DataTables Example -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i>
                list of transaction confirmed</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Client's Name</th>
                        <th>Events</th>
                        <th>Amount</th>
                        <th>Date of Events</th>
                        <th>Date of Transaction</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      <?php 
                          foreach ($transaction_records as $key => $transaction_record) {
                      ?>
                          <tr>
                            <td>
                                <?php 
                                  echo $transaction_record['first_name'] . " " .  $transaction_record['last_name'];
                                ?>
                              </td>
                            <td>
                              <?php 
                                if($transaction_record['event']){
                                    echo ucfirst($transaction_record['event']); 
                                }else{
                                    echo ucfirst('Catering Only'); 
                                }
                              ?>
                            </td>
                            <td><?php echo $transaction_record['total_amount'] ?></td>
                            <td><?php echo ucfirst($transaction_record['date']) ?></td>
                            <td><?php echo ucfirst($transaction_record['transaction_date']) ?></td>
                          </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
      </div>

    </div>
<!-- /.container-fluid -->

