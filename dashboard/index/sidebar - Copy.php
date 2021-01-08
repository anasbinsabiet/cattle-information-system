<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <img src="../../dist/img/cow5.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">C!MS</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION['user_name'];?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!--//////////////////////////////////////////////////////////////// Cattle Module-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-horse"></i>
            <p>
              Cattle Module
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-cog nav-icon"></i>
                <p>
                  Cattle Setup
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../cattle_module/color/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Color</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../cattle_module/animal_type/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Animal Type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../health_module/problem_type/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Problem Type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../health_module/problem_area/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Problem Area</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../cattle_module/cattle_status/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Cattle Status</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../cattle_module/cattle_kin/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Cattle Kin</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../task_module/task_type/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Task Type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../task_module/task_status/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Task Status</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../../cattle_module/cattle_profile/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Cattle Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../cattle_module/cattle_task" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Cattle Task</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../cattle_module/growth_tracking" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Cattle Growth Tracking</p>
              </a>
            </li>
          </ul>
        </li>
        <!--//////////////////////////////////////////////////////////////// Farm Module-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tractor"></i>
            <p>
              Farm Module
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-cog nav-icon"></i>
                <p>
                  Farm Setup
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../farm_module/designation/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Designation</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../../farm_module/farm_profile/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Farm Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../farm_module/employee_profile/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Employee Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../farm_module/user/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>User</p>
              </a>
            </li>
          </ul>
        </li>
        <!--//////////////////////////////////////////////////////////////// Food Module-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-apple-alt"></i>
            <p>
              Food Module
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-cog nav-icon"></i>
                <p>
                  Food Setup
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../food_module/chari_unit/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Chari Unit</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../food_module/food_type
                  /" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Food Type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../food_module/food_formula_unit" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Food Unit</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../../food_module/chari/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Chari List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../food_module/food/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Food</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../food_module/fpft/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Food Place Food Tracking</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../food_module/food_formula/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Food Formula</p>
              </a>
            </li>
          </ul>
        </li>
        <!--//////////////////////////////////////////////////////////////// Health Module-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-notes-medical"></i>
            <p>
              Health Module
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-cog nav-icon"></i>
                <p>
                  Health Setup
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../health_module/medicine_unit/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Medicine Unit</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../health_module/problem_type/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Problem Type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../health_module/problem_area/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Problem Area</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../../health_module/doctor_profile/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Doctor Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../health_module/health_checkup/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Health Checkup</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../health_module/medicine/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Medicine</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../health_module/medication_routine/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Medication Routine</p>
              </a>
            </li>
          </ul>
        </li>
        <!--//////////////////////////////////////////////////////////////// Land Module-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-mountain"></i>
            <p>
              Land Module
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-cog nav-icon"></i>
                <p>
                  Land Setup
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../land_module/land_type/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Land Type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../land_module/work_type/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Work Type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../land_module/costing_type/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Costing Type</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../../land_module/land_profile/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Land Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../land_module/land_costing/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Land Costing & Input</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../land_module/land_task/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Land Task</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../land_module/land_collection/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Collection From Land</p>
              </a>
            </li>
          </ul>
        </li>
        <!--//////////////////////////////////////////////////////////////// Task Module-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tasks"></i>
            <p>
              Task Module
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-cog nav-icon"></i>
                <p>
                  Task Setup
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../task_module/task_type/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Task Type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../task_module/task_status/" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Task Status</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../../task_module/task/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Task</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../task_module/task_complete/" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>Task Complete</p>
              </a>
            </li>
          </ul>
        </li> 
        <!--//////////////////////////////////////////////////////////////// Inventory Module-->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-invoice"></i>
            <p>
              Inventory Module
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-cog nav-icon"></i>
                <p>
                  Inventory Setup
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../inventory/storage" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Storage</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../inventory/supplier" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Supplier</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../food_module/food_formula_unit" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Unit</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../inventory/payment_status" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Payment Status</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../inventory/customer" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Customer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../inventory/location" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Location</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>
                  Cattle Food Inventory
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                
                <li class="nav-item">
                  <a href="../../inventory/stock_in_fi" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Stock In Food Inventory</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../inventory/stock_out_fi" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Stock Out Food Inventory</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>
                  Cattle Medicine Inventory
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../inventory/stock_in_med" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Stock In Medicine Inventory</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../inventory/stock_out_med" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Stock Out Medicine Inventory</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="far fa-star nav-icon"></i>
                <p>
                  Cattle Inventory
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../inventory/stock_in_cattle" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Stock In Cattle Inventory</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../inventory/stock_out_cattle" class="nav-link">
                    <i class="far fas fas fa-cog nav-icon"></i>
                    <p>Stock Out Cattle Inventory</p>
                  </a>
                </li>
              </ul>
            </li>
            
          </ul>
        </li>
    </ul>
  </nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">