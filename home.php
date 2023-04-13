<?php include('db_connect.php') ?>
<!-- Info boxes -->

</style>
<?php if($_SESSION['login_type'] == 1): ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box" style="border-radius: 0;">
              <span class="info-box-icon bg-info elevation-1"style="border-radius: 0;"><i class="fas fa-users"></i></span>

              <div class="info-box-content" >
                <span class="info-box-text">Total Students</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM students")->num_rows; ?>
                </span>
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box" style="border-radius: 0;">
              <span class="info-box-icon bg-primary elevation-1" style="border-radius: 0;"><i class="fas fa-th-list"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Classes</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM classes")->num_rows; ?>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box" style="border-radius: 0;" >
              <span class="info-box-icon bg-primary elevation-1"style="border-radius: 0;" ><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Subject</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM subjects")->num_rows; ?>
                </span>
              </div>
            </div>
          </div>
      </div>
      <div class="card" style="border-radius: 0;">
  <h5 class="card-header">Quick Action</h5>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<?php else: ?>
	 <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome <?php echo $_SESSION['login_name'] ?>!
          	</div>
          </div>
      </div>
          
<?php endif; ?>
