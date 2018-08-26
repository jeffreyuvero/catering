<div class="container">
  <div class="col-md-12">
     <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        list of Events</div>
        <div class="col-md-4">
          <br>
          <button class="btn btn-primary events_add">Add</button>
        </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Desciption</th>
                <th>Actions</th>
              </tr>
            </thead>
            
            <tbody>
              <?php 
                  foreach ($events as $key => $event) {
              ?>
                  <tr>
                    <td><?php echo ucfirst($event['name']) ?></td>
                    <td><?php echo ucfirst($event['description']) ?></td>
                    <td>
                      <button class="btn btn-success btn-edit" data-id="<?php echo $event['id'] ?>">Edit</button>
                      <button class="btn btn-danger btn-delete" data-id="<?php echo $event['id'] ?>">Delete</button>
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