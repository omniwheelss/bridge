
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
				<?php
				switch ($common->user_type_id) {
					case 1:
				?>
                <h3>Super Admin Section</h3>
				
                <ul class="nav side-menu">
				
				  <li><a><i class="fa fa-cloud-download"></i>Reports<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="index.php?do=list_logs">Vehicle Status Summary</a></li>
					  <li><a href="index.php?do=list_location">Whole Day Report</a></li>
					  <li><a href="index.php?do=list_project">Whole Day Summary</a></li>
					  <li><a href="index.php?do=list_project">Running Report</a></li>
					  <li><a href="index.php?do=list_project">Stappage Report</a></li>
					  <li><a href="index.php?do=list_project">Idle Report</a></li>
					  <li><a href="index.php?do=list_project">Event Detail Report</a></li>
					  <li><a href="index.php?do=list_project">IO Interface port report</a></li>
					  <li><a href="index.php?do=list_project">Inactive Summary report</a></li>
					  <li><a href="index.php?do=list_project">Fuel report</a></li>
					  <li><a href="index.php?do=list_project">Geozone alert</a></li>
					  <li><a href="index.php?do=list_project">Speed alert</a></li>
					  <li><a href="index.php?do=list_project">Start Stop Summary Report</a></li>
                    </ul>
                  </li>				
				
				  <li><a><i class="fa fa-map-marker"></i>Maps<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="index.php?do=list_logs">History Map</a></li>
					  <li><a href="index.php?do=list_location">Speed Chart</a></li>
					  <li><a href="index.php?do=list_project">Fuel Chart</a></li>
					  <li><a href="index.php?do=list_logs">Temperature Chart</a></li>
					  <li><a href="index.php?do=list_location">Engine RPM chart</a></li>
                    </ul>
                  </li>				
				
                  <li><a><i class="fa fa-users"></i>User Management<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="index.php?do=list_user">All Registered Users</a></li>
					  <li><a href="index.php?do=list_user_type">List User Type</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-gears"></i>Device Management<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="index.php?do=list_device_type">List Devices</a></li>
					  <li><a href="index.php?do=list_operator">List Operators</a></li>
                    </ul>
                  </li>
				  
                  <li><a><i class="fa fa-anchor"></i>ACL Management<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="index.php?do=list_screen">List Screens</a></li>
					  <li><a href="index.php?do=list_acl_screen">List ACL Screens</a></li>
                    </ul>
                  </li>
				  
                 <li><a><i class="fa fa-cog"></i>Other Settings<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="index.php?do=list_logs">List Logs</a></li>
					  <li><a href="index.php?do=list_location">Location Details</a></li>
					  <li><a href="index.php?do=list_project">Project Details</a></li>
					  <li><a href="index.php?do=list_project">API Details</a></li>
                    </ul>
                  </li>
				  
				  
                </ul>
				<?php
					break;
					case 2:
				?>
                <h3>Administrative Section</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i>User Section<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?do=add_sample">Add Sample</a></li>
                      <li><a href="index.php?do=list_sample">List Sample</a></li>
                    </ul>
                  </li>
                </ul>
				<?php
					break;

					case 3:
				?>
                <h3>User Section</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i>User Section<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?do=list_device_type">List Devices</a></li>
                    </ul>
                  </li>
                </ul>
				<?php
					break;
					default:
					break;
				}	
				?>	
              </div>
            </div>
			