<div id="wrapper">
  
  <!-- Sidebar -->
  <ul class="sidebar navbar-nav">
    <?php 
      if ($group_type != 4) {
    ?>
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>File Maintenance</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Transaction List</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $site_url ?>/staff_registration">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Staff Registration</span>
        </a>
      </li>
    <?php 
      } else {
    ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $site_url ?>/transaction">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Transaction</span>
      </a>
    </li>

    <?php 
      }
    ?>
    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Account Settings</span></a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $site_url ?>/base/logout">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Logout</span>
      </a>
    </li>

  </ul>