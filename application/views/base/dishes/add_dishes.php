<div class="container">
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Add Dishes</div>
    <div class="card-body">
      <!-- <form> -->
        <?php echo form_open('dishes/insert') ?>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <div class="form-label-group">
                <input type="text" id="name"  name="name" class="form-control" placeholder="Dish name" required="required" >
                <label for="name">Name</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <div class="form-label-group">
                <input type="text" id="description"  name="description" class="form-control" placeholder="Description" required="required" >
                <label for="description">Description</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <div class="form-label-group">
                <input type="text" id="price"  name="price" class="form-control" placeholder="Price" required="required" >
                <label for="price">Price</label>
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