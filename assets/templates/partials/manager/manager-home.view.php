<?php if(isset($_GET['p'])): ?>
		<?php if( $_GET['p'] === 'update'): ?>
			<h3 class="text-center font-weight-light">Update Member</h3>
			<?php  require_once($_SERVER['DOCUMENT_ROOT'].'/projects/hostel/assets/templates/partials/manager/manager-update.view.php'); ?>
		<?php elseif($_GET['p'] === 'delete'): ?>
			<h3 class="text-center font-weight-light">Delete Member</h3>
			<?php  require_once($_SERVER['DOCUMENT_ROOT'].'/projects/hostel/assets/templates/partials/manager/manager-delete.view.php'); ?>
		<?php else: ?>
			<h3 class="text-center font-weight-light">Add Member</h3>
			<?php  require_once($_SERVER['DOCUMENT_ROOT'].'/projects/hostel/assets/templates/partials/manager/manager-add.view.php'); ?>
		<?php endif; ?>
<?php else: ?> 
	<h3 class="text-center font-weight-light">Add Member</h3>
	<?php  require_once($_SERVER['DOCUMENT_ROOT'].'/projects/hostel/assets/templates/partials/manager/manager-add.view.php'); ?>
<?php endif; ?>
<script type="text/javascript" src="<?php echo DOCROOT.'/assets/js/member-updateAJAX.js'; ?> ">
</script>
