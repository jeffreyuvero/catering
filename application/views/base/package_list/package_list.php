<div class="container">
  <div class="col-md-12">
     <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        list of Package</div>
        <div class="col-md-4">
          <br>
          <button class="btn btn-primary addons_add-package">Add</button>
        </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
              </tr>
            </thead>
            
            <tbody>
              <?php 
                  foreach ($packages as $key => $package) {
              ?>
                  <tr>
                    <td><?php echo ucfirst($package['package']) ?></td>
                    <td><?php echo ucfirst($package['description']) ?></td>
                    <td><?php echo ucfirst($package['price']) ?></td>
                    <td>
                      <button class="btn btn-success btn-edit-package" data-id="<?php echo $package['id'] ?>">Edit</button>
                      <button class="btn btn-danger btn-delete-package" data-id="<?php echo $package['id'] ?>">Delete</button>
                      <button class="btn btn-warning btn-inclusion-package" data-id="<?php echo $package['id'] ?>">Package Inclusion</button>
                    </td>
                  </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">
        <!-- Updated yesterday at 11:59 PM -->
      </div>
    </div>
  </div>
</div>