<!-- if profile  -->
<?php 	if( $_SERVER['PHP_SELF'] == "/projects/hostel/assets/templates/manager/manager-home.view.php" ) : ?>
<div class="sidebar">
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-home.view.php?p=view" class="font-bold">View</a>
	</div>
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
<?php if( $_SERVER['PHP_SELF'] == "/projects/hostel/assets/templates/manager/manager-complaint.view.php" ) : ?>
<div class="sidebar">
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-complaint.view.php?p=view" class="font-bold">View Complaints</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-complaint.view.php?p=dlt" class="font-bold">Delete Complaint</a>
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
		<a href="/projects/hostel/assets/templates/manager/manager-fees.view.php?p=update" class="font-bold">Update Fees</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-fees.view.php?p=view" class="font-bold">View Records</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-fees.view.php?p=pay" class="font-bold">Payment</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-fees.view.php?p=fine" class="font-bold">Fine</a>
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
<!-- Notice -->
<?php 	if( $_SERVER['PHP_SELF'] == "/projects/hostel/assets/templates/manager/manager-notice.view.php" ) : ?>
<div class="sidebar">
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-notice.view.php?p=add" class="font-bold">New</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-notice.view.php?p=view" class="font-bold">View</a>
	</div>

</div>
<?php endif; ?>

<!-- If library -->

<?php 	if( $_SERVER['PHP_SELF'] == "/projects/hostel/assets/templates/manager/manager-library.view.php" ) : ?>
<div class="sidebar">
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-library.view.php?p=add" class="font-bold">Add </a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-library.view.php?p=delete" class="font-bold">Remove</a>
	</div>
	<div class="sidebar-item">
		<a href="/projects/hostel/assets/templates/manager/manager-library.view.php?p=requests" class="font-bold">Requests</a>
	</div>

</div>
<?php endif; ?>
