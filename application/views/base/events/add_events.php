<div class="container">
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Add Events</div>
    <div class="card-body">
      <!-- <form> -->
        <?php echo form_open('events/insert') ?>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <div class="form-label-group">
                <input type="text" id="name"  name="name" class="form-control" placeholder="Events" required="required" >
                <label for="name">Name</label>
              </div>
            </div>s
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <div class="form-label-group">
                <input type="text" id="description"  name="description" class="form-control" placeholder="Description" required="required" >
                <label for="description">description</label>
              </div>
            </div>
          </div>
        </div>
        <!-- <a class="btn btn-primary btn-block" href="login.html">Register</a> -->
        <input type="submit" value="Add" class="btn btn-primary btn-block">
      </form>
      <div class="text-center">
      </div>
    </div>
  </div>
</div>