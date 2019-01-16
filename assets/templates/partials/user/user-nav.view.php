<!-- if is already applied dont show apply option -->
<nav class="nav">
	<li class="nav-item">
		<a href="<?php echo DOCROOT.'/assets/templates/user/user-home.view.php?p=home';?>" class="nav-link">Profile</a>
	</li>
	<li class="nav-item">
		<a href="<?php echo DOCROOT.'/assets/templates/user/user-notice-board.view.php?p=my';?>" class="nav-link" class="nav-link">Notice-Board</a>
	</li>
	<li class="nav-item">
		<a href="<?php echo DOCROOT.'/assets/templates/user/user-complaint.view.php?p=new'; ?>" class="nav-link">Complaint</a>
	</li>
	<li class="nav-item">
		<a href="<?php echo DOCROOT.'/assets/templates/user/user-library.view.php?p=allbooks'; ?>" class="nav-link">Library</a>
	</li>
	<li class="nav-item">
		<a href="<?php echo DOCROOT.'/assets/templates/user/logout.view.php'; ?> " class="nav-link logout">Logout</a>
	</li>
	<!-- if manager show this -->
</nav>