<?php if (!empty($_REQUEST['nav'])) {
	$get_nav=$_REQUEST['nav'];
}else{
	$get_nav='home';
} 
	$page="pages/".$get_nav.".php";
?>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="active"> 
								<a href="index.php?nav=home"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li> 
								<a href="index.php?nav=batch_display"><i class="fe fe-book"></i> <span>Batches</span></a>
							</li>
							<li> 
								<a href="index.php?nav=mark_attendence"><i class="fe fe-book"></i> <span>Attendence</span></a>
							</li>
							<li> 
								<a href="index.php?nav=display_lecture"><i class="fe fe-book"></i> <span>Lectures</span></a>
							</li>
							<li> 
									<a href="index.php?nav=display_assignments"><i class="fe fe-file"></i> <span>Assignments</span></a>
							</li>
							
						</ul>
					</div>
                </div>
            </div>
<!-- /Sidebar -->