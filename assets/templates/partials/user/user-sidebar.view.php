<!-- if profile  -->
<?php 	if( $_SERVER['PHP_SELF'] == "/projects/hostel/assets/templates/user/user-home.view.php" ) : ?>
<div class="sidebar">
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/user/user-home.view.php?p=attendence" class="font-bold">Attendance</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/user/user-home.view.php?p=fee" class="font-bold">Fee</a>
	</div>
</div>
<?php endif; ?>
<!-- if Library -->
<?php if( $_SERVER['PHP_SELF'] == "/projects/hostel/assets/templates/user/user-library.view.php" ) : ?>
<div class="sidebar">
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/user/user-library.view.php?p=allbooks" class="font-bold">All Books</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/user/user-library.view.php?p=request" class="font-bold">Request New Book</a>
	</div>
</div>
<?php endif; ?>
<!-- if complaint -->
<?php if( $_SERVER['PHP_SELF'] == "/projects/hostel/assets/templates/user/user-complaint.view.php" ) : ?>
<div class="sidebar">
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/user/user-complaint.view.php?p=new" class="font-bold">New Complaint</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/user/user-complaint.view.php?p=previous" class="font-bold">Previous Complaints</a>
	</div>
</div>
<?php endif; ?>
<!-- if Notice Board -->
<?php if( $_SERVER['PHP_SELF'] == "/projects/hostel/assets/templates/user/user-notice-board.view.php" ) : ?>
<div class="sidebar">
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/user/user-notice-board.view.php?new" class="font-bold">New Notices</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/user/user-notice-board.view.php?p=old" class="font-bold">Old Notices</a>
	</div>
</div>
<?php endif; ?>