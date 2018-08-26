<div class="container">
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Edit events</div>
    <div class="card-body">
      <!-- <form> -->
        <?php echo form_open('events/update/'. $event['id']) ?>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <div class="form-label-group">
                <input type="text" id="name"  name="name" class="form-control" placeholder="addon name" required="required" value="<?php echo $event['name'] ?>" >
                <label for="name">Name</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <div class="form-label-group">
                <input type="text" id="description"  name="description" class="form-control" placeholder="Description" required="required" value="<?php echo $event['description'] ?>">
                <label for="description">Description</label>
              </div>
            </div>
          </div>
        </div>
        <!-- <a class="btn btn-primary btn-block" href="login.html">Register</a> -->
        <input type="submit" value="update" class="btn btn-primary btn-block">
      </form>
      <div class="text-center">
      </div>
    </div>
  </div>
</div>