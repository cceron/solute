<?php
	// echo"<pre>";
	// print_r($array_session_data);
	// echo"</pre>";
	// exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Cristian Ceron">

	<title>Home</title>

	<link rel="shortcut icon" href="<?php echo base_url("assets/template/images/favicon.ico")?>">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->
	<!-- <link href="css/dark.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- Remove this after purchasing -->
	<!-- <link class="js-stylesheet" href="css/light.css" rel="stylesheet"> -->
	<!-- <script src="js/settings.js"></script> -->
	<!-- END SETTINGS -->

    <link class="js-stylesheet" href="<?php echo base_url("assets/template/css/light.css")?>" rel="stylesheet">
	<!-- <script src="<?php echo base_url("assets/template/js/settings.js")?>"></script> -->
	<!-- END SETTINGS -->
	<link rel="stylesheet" href="<?php echo base_url("assets/template/css/bootstrap-icons.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/template/css/notyf.min.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/template/css/notify.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/template/css/select2.min.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/template/css/jquery.dataTables.min.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/template/css/responsive.dataTables.min.css")?>">
	
	<link rel="stylesheet" href="<?php echo base_url("assets/css/platform.css")?>">
</head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                        <path d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4 C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z"/>
                        <path d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5 c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z"/>
                        <path d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5 c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z"/>
                    </svg>
                    <span class="align-middle me-3">AppStack</span>
                </a>
                <ul class="sidebar-nav">
					<?php
					foreach($arrray_permissions["by_group"] as $group => $array_modules){?>
						<li class="sidebar-header text-capitalize"><?php echo $group?></li><?php
						foreach($array_modules as $id_module => $array_permissions){
							$default_active=($array_permissions["module"]=="dashboard" || $array_permissions["module"]=="uf")?"active":"";?>
							<li class="sidebar-item <?php echo $default_active?>">
								<a data-bs-target="<?php echo $array_permissions["url"]."/".$id_module?>" data-bs-toggle="" class="sidebar-link">
									<i class="align-middle " data-feather="<?php echo $array_permissions["icon_class"]?>"></i> 
									<span class="align-middle text-capitalize"><?php echo $array_permissions["module"]?></span>
									<!-- <span class="badge badge-sidebar-primary">5</span> -->
								</a>
							</li><?php
							// echo"<pre>";
							// print_r($array_permissions);
							// echo"</pre>";
						}
						
					}
					?>
					
					<!-- <li class="sidebar-item active">
						<a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
                            <span class="badge badge-sidebar-primary">5</span>
                        </a>
					</li>
					<li class="sidebar-header">Tools & Components</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="tables-bootstrap.html">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">Tables</span>
                        </a>
					</li> -->

					<!-- <li class="sidebar-header">Plugins & Addons</li>
					<li class="sidebar-item">
						<a data-bs-target="#form-plugins" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Form Plugins</span>
                        </a>
						<ul id="form-plugins" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="forms-advanced-inputs.html">Advanced Inputs</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-editors.html">Editors</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-validation.html">Validation</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-wizard.html">Wizard</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#datatables" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">DataTables</span>
                        </a>
						<ul id="datatables" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-responsive.html">Responsive Table</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-buttons.html">Table with Buttons</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-column-search.html">Column Search</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-fixed-header.html">Fixed Header</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-multi.html">Multi Selection</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-ajax.html">Ajax Sourced Data</a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a data-bs-target="#charts" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="pie-chart"></i> <span class="align-middle">Charts</span>
                            <span class="badge badge-sidebar-primary">New</span>
                        </a>
						<ul id="charts" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="charts-chartjs.html">Chart.js</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="charts-apexcharts.html">ApexCharts <span class="badge badge-sidebar-primary">New</span></a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="notifications.html">
                            <i class="align-middle" data-feather="bell"></i> <span class="align-middle">Notifications</span>
                        </a>
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#maps" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="map-pin"></i> <span class="align-middle">Maps</span>
                        </a>
						<ul id="maps" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="maps-google.html">Google Maps</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="maps-vector.html">Vector Maps</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="calendar.html">
                            <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Calendar</span>
                        </a>
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#multi" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="share-2"></i> <span class="align-middle">Multi Level</span>
                        </a>
						<ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
							<li class="sidebar-item">
								<a data-bs-target="#multi-2" data-bs-toggle="collapse" class="sidebar-link collapsed">Two Levels</a>
								<ul id="multi-2" class="sidebar-dropdown list-unstyled collapse">
									<li class="sidebar-item">
										<a class="sidebar-link" data-bs-target="#">Item 1</a>
										<a class="sidebar-link" data-bs-target="#">Item 2</a>
									</li>
								</ul>
							</li>
							<li class="sidebar-item">
								<a data-bs-target="#multi-3" data-bs-toggle="collapse" class="sidebar-link collapsed">Three Levels</a>
								<ul id="multi-3" class="sidebar-dropdown list-unstyled collapse">
									<li class="sidebar-item">
										<a data-bs-target="#multi-3-1" data-bs-toggle="collapse" class="sidebar-link collapsed">Item 1</a>
										<ul id="multi-3-1" class="sidebar-dropdown list-unstyled collapse">
											<li class="sidebar-item">
												<a class="sidebar-link" data-bs-target="#">Item 1</a>
												<a class="sidebar-link" data-bs-target="#">Item 2</a>
											</li>
										</ul>
									</li>
									<li class="sidebar-item">
										<a class="sidebar-link" data-bs-target="#">Item 2</a>
									</li>
								</ul>
							</li>
						</ul>
					</li> -->
				</ul>

				<!-- <div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">Monthly Sales Report</strong>
						<div class="mb-3 text-sm">Your monthly sales report is ready for download!</div>

						<div class="d-grid"><a href="https://themes.getbootstrap.com/product/appstack-responsive-admin-template/" class="btn btn-primary" target="_blank">Download</a></div>
					</div>
				</div> -->
			</div>
		</nav>
		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle"><i class="hamburger align-self-center"></i></a>

                <!-- <form class="d-none d-sm-inline-block">
                    <div class="input-group input-group-navbar">
                        <input type="text" class="form-control" placeholder="Search projects…" aria-label="Search">
                        <button class="btn" type="button"><i class="align-middle" data-feather="search"></i></button>
                    </div>
                </form> -->

                <!-- <ul class="navbar-nav">
                    <li class="nav-item px-2 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mega menu</a>
                        <div class="dropdown-menu dropdown-menu-start dropdown-mega" aria-labelledby="servicesDropdown">
                            <div class="d-md-flex align-items-start justify-content-start">
                                <div class="dropdown-mega-list">
                                    <div class="dropdown-header">UI Elements</div>
                                    <a class="dropdown-item" href="#">Alerts</a>
                                    <a class="dropdown-item" href="#">Buttons</a>
                                    <a class="dropdown-item" href="#">Cards</a>
                                    <a class="dropdown-item" href="#">Carousel</a>
                                    <a class="dropdown-item" href="#">General</a>
                                    <a class="dropdown-item" href="#">Grid</a>
                                    <a class="dropdown-item" href="#">Modals</a>
                                    <a class="dropdown-item" href="#">Tabs</a>
                                    <a class="dropdown-item" href="#">Typography</a>
                                </div>
                                <div class="dropdown-mega-list">
                                    <div class="dropdown-header">Forms</div>
                                    <a class="dropdown-item" href="#">Layouts</a>
                                    <a class="dropdown-item" href="#">Basic Inputs</a>
                                    <a class="dropdown-item" href="#">Input Groups</a>
                                    <a class="dropdown-item" href="#">Advanced Inputs</a>
                                    <a class="dropdown-item" href="#">Editors</a>
                                    <a class="dropdown-item" href="#">Validation</a>
                                    <a class="dropdown-item" href="#">Wizard</a>
                                </div>
                                <div class="dropdown-mega-list">
                                    <div class="dropdown-header">Tables</div>
                                    <a class="dropdown-item" href="#">Basic Tables</a>
                                    <a class="dropdown-item" href="#">Responsive Table</a>
                                    <a class="dropdown-item" href="#">Table with Buttons</a>
                                    <a class="dropdown-item" href="#">Column Search</a>
                                    <a class="dropdown-item" href="#">Muulti Selection</a>
                                    <a class="dropdown-item" href="#">Ajax Sourced Data</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul> -->

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                                <div class="position-relative"><i class="align-middle" data-feather="message-circle"></i><span class="indicator">4</span></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
                                <div class="dropdown-menu-header">
                                    <div class="position-relative">4 New Messages</div>
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2"><img src="<?php echo base_url("assets/template/images/avatar-5.jpg")?>" class="avatar img-fluid rounded-circle" alt="Ashley Briggs"></div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Ashley Briggs</div>
                                                <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
                                                <div class="text-muted small mt-1">15m ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="<?php echo base_url("assets/template/images/avatar-2.jpg")?>" class="avatar img-fluid rounded-circle" alt="Carl Jenkins">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Carl Jenkins</div>
                                                <div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="<?php echo base_url("assets/template/images/avatar-4.jpg")?>" class="avatar img-fluid rounded-circle" alt="Stacie Hall">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Stacie Hall</div>
                                                <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
                                                <div class="text-muted small mt-1">4h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="<?php echo base_url("assets/template/images/avatar-3.jpg")?>" class="avatar img-fluid rounded-circle" alt="Bertha Martin">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Bertha Martin</div>
                                                <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
                                                <div class="text-muted small mt-1">5h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer"><a href="#" class="text-muted">Show all messages</a></div>
                            </div>
				        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                                <div class="position-relative"><i class="align-middle" data-feather="bell-off"></i></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">4 New Notifications</div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2"><i class="text-danger" data-feather="alert-circle"></i></div>
                                            <div class="col-10">
                                                <div class="text-dark">Update completed</div>
                                                <div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-warning" data-feather="bell"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Lorem ipsum</div>
                                                <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
                                                <div class="text-muted small mt-1">6h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2"><i class="text-primary" data-feather="home"></i></div>
                                            <div class="col-10">
                                                <div class="text-dark">Login from 192.186.1.1</div>
                                                <div class="text-muted small mt-1">8h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2"><i class="text-success" data-feather="user-plus"></i></div>
                                            <div class="col-10">
                                                <div class="text-dark">New connection</div>
                                                <div class="text-muted small mt-1">Anna accepted your request.</div>
                                                <div class="text-muted small mt-1">12h ago</div>
                                            </div>
                                        </div>
                                    </a>
						        </div>
                                <div class="dropdown-menu-footer"><a href="#" class="text-muted">Show all notifications</a></div>
					        </div>
				        </li> -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-flag dropdown-toggle" href="#" id="languageDropdown" data-bs-toggle="dropdown"><img src="<?php echo base_url("assets/template/images/us.png")?>" alt="English" /></a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                                <a class="dropdown-item" href="#"><img src="<?php echo base_url("assets/template/images/us.png")?>" alt="English" width="20" class="align-middle me-1" /><span class="align-middle">English</span></a>
                                <a class="dropdown-item" href="#"><img src="<?php echo base_url("assets/template/images/es.png")?>" alt="Spanish" width="20" class="align-middle me-1" /><span class="align-middle">Spanish</span></a>
                                <a class="dropdown-item" href="#"><img src="<?php echo base_url("assets/template/images/de.png")?>" alt="German" width="20" class="align-middle me-1" /><span class="align-middle">German</span></a>
                                <a class="dropdown-item" href="#"><img src="<?php echo base_url("assets/template/images/nl.png")?>" alt="Dutch" width="20" class="align-middle me-1" /><span class="align-middle">Dutch</span></a>
                            </div>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown"><img src="<?php echo base_url("assets/images/user.png")?>" class="avatar img-fluid rounded-circle me-1" alt="" /> </a>
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <img src="<?php echo base_url("assets/images/user.png")?>" class="avatar img-fluid rounded-circle me-1" alt="" /> 
                                <span class="text-dark"><?php echo $array_session_data["platform"]["data"]["first_name"]." ".$array_session_data["platform"]["data"]["last_name"]?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="edit-2"></i> Mis Datos</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1" data-feather="send"></i> Solicitar Permisos</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Soporte y Ayuda</a>
                                <a class="dropdown-item" href="home/log_out"><i class="align-middle me-1" data-feather="log-out"></i> Salir</a>
                            </div>
                        </li>
			        </ul>
		        </div>
	        </nav>

			<main class="content">
				<!-- <div class="row">
						<div class="col-12 col-lg-8 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-end">
										<div class="dropdown position-relative">
										<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
          									<i class="align-middle" data-feather="more-horizontal"></i>
        								</a>

										<div class="dropdown-menu dropdown-menu-end">
											<a class="dropdown-item" href="#">Action</a>
											<a class="dropdown-item" href="#">Another action</a>
											<a class="dropdown-item" href="#">Something else here</a>
										</div>
									</div>
								</div>
								<h5 class="card-title mb-0">Sales / Revenue</h5>
							</div>
							<div class="card-body d-flex w-100">
								<div class="align-self-center chart chart-lg">
									<canvas id="chartjs-dashboard-bar"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div> -->
			</main>
			<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true" >
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header bg-primary">
							<h3 class="modal-title text-white"></h3>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body"></div>
						<!-- <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div> -->
					</div>
				</div>
			</div>
			<!-- <footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms of Service</a>
								</li>
							</ul>
						</div>
						<div class="col-6 text-end">
							<p class="mb-0">
								&copy; 2021 - <a href="index.html" class="text-muted">AppStack</a>
							</p>
						</div>
					</div>
				</div>
			</footer> -->
		</div>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	
	<script src="<?php echo base_url("assets/template/js/app.js")?>"></script>
	
	<!-- <script src="<?php echo base_url("assets/template/js/jquery.dataTables.min.js")?>"></script> -->
	<script src="<?php echo base_url("assets/template/js/dataTables.responsive.min.js")?>"></script>
	<script src="<?php echo base_url("assets/template/js/notyf.min.js")?>"></script>
	<script src="<?php echo base_url("assets/template/js/notify.js")?>"></script>
	<!-- <script src="<?php echo base_url("assets/template/js/select2.min.js")?>"></script> -->
	
	<script src="<?php echo base_url("assets/js/utils.js")?>"></script>
	<script src="<?php echo base_url("assets/js/platform.js")?>"></script>
    
	<!-- <script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Last year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .325,
						categoryPercentage: .5
					}, {
						label: "This year",
						backgroundColor: window.theme["primary-light"],
						borderColor: window.theme["primary-light"],
						hoverBackgroundColor: window.theme["primary-light"],
						hoverBorderColor: window.theme["primary-light"],
						data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68],
						barPercentage: .325,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					cornerRadius: 15,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							ticks: {
								stepSize: 20
							},
							stacked: true,
						}],
						xAxes: [{
							gridLines: {
								color: "transparent"
							},
							stacked: true,
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			$("#datetimepicker-dashboard").datetimepicker({
				inline: true,
				sideBySide: false,
				format: "L"
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Direct", "Affiliate", "E-mail", "Other"],
					datasets: [{
						data: [2602, 1253, 541, 1465],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger,
							"#E8EAED"
						],
						borderWidth: 5,
						borderColor: window.theme.white
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					cutoutPercentage: 70,
					legend: {
						display: false
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			$("#datatables-dashboard-projects").DataTable({
				pageLength: 6,
				lengthChange: false,
				bFilter: false,
				autoWidth: false
			});
		});
	</script> -->

</body>

</html>