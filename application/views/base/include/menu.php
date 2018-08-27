<div id="wrapper">
  
  <!-- Sidebar -->
  <ul class="sidebar navbar-nav">
    <?php 
      if ($group_type != 4) {
    ?>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $site_url ?>/transaction_list">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Transaction List</span></a>
      </li>


      <li class="nav-item">
        <a class="nav-link"  href="<?php echo $site_url ?>/file_maintenance">
          <i class="fas fa-cogs"></i>
          <span>File Maintenance</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $site_url ?>/staff_registration">
          <i class="fas fa-fw fa-user-plus"></i>
          <span>Staff Registration</span>
        </a>
      </li>
    <?php 
      } else {
    ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $site_url ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $site_url ?>/transaction">
        <i class="fas fa-fw fa-address-card"></i>
        <span>Transaction</span>
      </a>
    </li>

    <?php 
      }
    ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $site_url ?>/account_settings">
        <i class="fas fa-wrench"></i>
        <span>Account Settings</span></a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $site_url ?>/base/logout">
        <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
      </a>
    </li>

  </ul>