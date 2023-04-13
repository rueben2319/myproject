  <style>
    .banner {
             width: 100%;
             height: 8px;
             color: #fff;
             padding: 5px;
             }
  </style>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="banner">
      <h1 style="font-size:25px;">Rose Garden School</h1>
    </div>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown">
          <a class="nav-link nav-home" href="./" style="padding-right: 20px; padding-left: 50px;">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
          </li>    
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_student" style="padding-right: 20px; padding-left: 50px;">
              <span class="menu-title">Master List</span>
              <i  style="padding-left:38px ;" class="nav-icon fas fa-list"></i>
                <i class="right fas fa-angle-left"></i>
              </span>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=student_list" class="nav-link nav-new_student tree-item" style="padding-right: 20px; padding-left: 50px;">
                  <span>students</span>
                  <i style="padding-left:100px ;"  class="nav-icon fas fa-users"></i>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=subjects" class="nav-link nav-student_list tree-item" style="padding-right: 20px; padding-left: 50px;">
                  <span>Subjects</span>
                  <i style="padding-left:100px ;" class="nav-icon fas fa-book"></i>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=classes" class="nav-link nav-student_list tree-item" style="padding-right: 20px; padding-left: 50px;">
                  <span>Classes</span>
                  <i style="padding-left:100px ;" class="nav-icon fas fa-room"></i>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item dropdown">
            <a href="./index.php?page=results" class="nav-link nav-results nav-new_result nav-edit_result" style="padding-right: 20px; padding-left: 50px;">
              <span>
                Results
              </span>
              <i style="padding-left:70px ;"  class="nav-icon fas fa-file-alt"></i>
            </a>
          </li>  
        </ul>
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
  		var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		if($('.nav-link.nav-'+page).length > 0){
  			$('.nav-link.nav-'+page).addClass('active')
          console.log($('.nav-link.nav-'+page).hasClass('tree-item'))
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
          $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
      $('.manage_account').click(function(){
        uni_modal('Manage Account','manage_user.php?id='+$(this).attr('data-id'))
      })
  	})
  </script>