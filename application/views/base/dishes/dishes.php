<div class="container">
  <div class="col-md-12">
     <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        list of Dishes</div>
        <div class="col-md-4">
          <br>
          <button class="btn btn-primary dishes_add-dishes">Add</button>
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
                  foreach ($dishes as $key => $dish) {
              ?>
                  <tr>
                    <td><?php echo ucfirst($dish['name']) ?></td>
                    <td><?php echo ucfirst($dish['description']) ?></td>
                    <td><?php echo ucfirst($dish['price']) ?></td>
                    <td>
                      <button class="btn btn-success btn-edit-dishes" data-id="<?php echo $dish['id'] ?>">Edit</button>
                      <button class="btn btn-danger btn-delete-dishes" data-id="<?php echo $dish['id'] ?>">Delete</button>
                    </td>
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