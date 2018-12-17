<!-- if profile  -->
<?php 	if( $_SERVER['PHP_SELF'] == "/projects/hostel/assets/templates/manager/manager-home.view.php" ) : ?>
<div class="sidebar">
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-home.view.php?p=add" class="font-bold">Add</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-home.view.php?p=delete" class="font-bold">Delete</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-home.view.php?p=update" class="font-bold">Update</a>
	</div>
</div>
<?php endif; ?>
<!-- if Library -->
<?php if( $_SERVER['PHP_SELF'] == "/projects/hostel/assets/templates/manager/user-library.view.php" ) : ?>
<div class="sidebar">
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/user-library.view.php?p=allbooks" class="font-bold">All Books</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/user-library.view.php?p=request" class="font-bold">Request New Book</a>
	</div>
</div>
<?php endif; ?>
<!-- if complaint -->
<?php if( $_SERVER['PHP_SELF'] == "/projects/hostel/assets/templates/manager/user-complaint.view.php" ) : ?>
<div class="sidebar">
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/user-complaint.view.php?p=new" class="font-bold">New Complaint</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/user-complaint.view.php?p=previous" class="font-bold">Previous Complaints</a>
	</div>
</div>
<?php endif; ?>
<!-- if Notice Board -->
<?php if( $_SERVER['PHP_SELF'] == "/projects/hostel/assets/templates/manager/user-notice-board.view.php" ) : ?>
<div class="sidebar">
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/user-notice-board.view.php?new" class="font-bold">New Notices</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/user-notice-board.view.php?p=old" class="font-bold">Old Notices</a>
	</div>
</div>
<?php endif; ?>
<!-- if Fees -->
<?php if( $_SERVER['PHP_SELF'] == "/projects/hostel/assets/templates/manager/manager-fees.view.php" ) : ?>
<div class="sidebar">
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-fees.view.php?new" class="font-bold">Update Fees</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-fees.view.php?p=old" class="font-bold">Record Payment</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-fees.view.php?new" class="font-bold">Fine</a>
	</div>
</div>
<?php endif; ?>
<!-- if Attendence  -->
<?php 	if( $_SERVER['PHP_SELF'] == "/projects/hostel/assets/templates/manager/manager-attendence.view.php" ) : ?>
<div class="sidebar">
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-attendence.view.php?p=add" class="font-bold">Record Attendence</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-attendence.view.php?p=view" class="font-bold">View Records</a>
	</div>
</div>
<?php endif; ?>