<div class="section">
	<?php if(  isset($_GET['p'])  &&  $_GET['p'] === 'home' ||  empty($_GET['p']) ): ?>
	<h3 class="text-center" style="margin-bottom: 2rem">Welcome <strong> <?= $_SESSION['name'][0]->user_name ?> </strong> </h3>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Reg Num</th>
				<th>Branch</th>
				<th>Year</th>
				<th>Email</th>
				<th>Room</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td> <?= $_SESSION['name'][0]->user_reg    ?>  </td>
				<td> <?= $_SESSION['name'][0]->user_branch ?>  </td>
				<td> <?= $_SESSION['name'][0]->user_year   ?>  </td>
				<td> <?= $_SESSION['name'][0]->user_email  ?>  </td>
				<td> <?= $_SESSION['name'][0]->user_room   ?>  </td>
			</tr>
		</tbody>
	</table>
	<?php elseif(  isset($_GET['p'])   &&  $_GET['p'] === 'attendence' ||  empty($_GET['p']) ): ?>
	<?php require_once( $_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/attendence.class.php" ); ?>
		<?php $row = $ob->getPreviousMonthRecords($_SESSION['name'][0]->user_reg); ?>
		<h4 class="text-center mb-3">Attendence Previous Month</h4>
		<table class="table table-hover">
			<thead class="thead-light ">
				<tr>
					<th>id</th>
					<th>User Reg</th>
					<th>Present/Absent</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $key => $val):  ?>
				<tr>
					<td><?= $row[$key]['id'] ?></td>
					<td><?= $row[$key]['user_id'] ?></td>
					<td><?= $row[$key]['attendence'] ?></td>
					<td><?= $row[$key]['recorded_date'] ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	<?php elseif(  isset($_GET['p'])   &&   $_GET['p'] === 'fee' ): ?>
		<div class="row">
			<h3> Current Fee
			<?php 
				require_once( $_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/fee.class.php" );
				$reg = 15150442;
				$fee = new Fee($db->make());?> 
				<span class="font-weight-bold"> 
				<?php echo $fee->genFeesUser($reg); ?>
				</span>
			</h3>
		</div>
		<div class="section">

		<?php require_once( $_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/payment.class.php" );  ?>
			<table class="table table-hover mt-3">
			<caption>Previous Payments</caption>
				<thead class="thead-light">
					<tr>
						<th>Id</th>
						<th>Days Present</th>
						<th>Amount Payed</th>
						<th>Payment Date</th>
					</tr>
				</thead>	
				<tbody>
				<?php
				$row = $ob->getPreviousRecords($_SESSION['name'][0]->user_reg);
				foreach ($row as $key => $value) {
					echo '<tr>';
						echo '<td>';
							echo $row[$key]['id'];
						echo '</td>';
						echo '<td>';
							echo $row[$key]['present_days'];
						echo '</td>';
						echo '<td>';
							echo $row[$key]['payment_amount'];
						echo '</td>';						
						echo '<td>';
							echo $row[$key]['payment_date'];
						echo '</td>';
					echo '</tr>';
				}?>
			</tbody>	
			</table>
		</div> 
		<script type="text/javascript" src="<?php echo DOCROOT.'/assets/js/user-fee.js'; ?>"></script>
	<?php endif; ?>
</div>