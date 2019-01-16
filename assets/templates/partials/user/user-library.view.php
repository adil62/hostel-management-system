<?php if( isset($_GET['p']) && $_GET['p'] === 'allbooks' ):  ?>
<div class="top">
<h3 class="text-center font-weight-light" style="margin-top: -2rem;">All Available Books At The Library</h3>

<div class="row">	
	<input class="form-control col-md-4 offset-md-6 " type="text" placeholder="Search For Available Books In the Library" aria-label="Search" name="searchTxt">
	<input type="submit" name="search" value="Search" class="btn-success btn-sm col-md-1 form-control">
</div>
</form>
</div>
<div class="content">
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/library.class.php"); ?>
	<?php $row = $ob->getAll(); ?>
	<?php if( sizeof($row) > 0 ):  ?>
		<table class="table table-hover" id="statTable">
			<thead class="thead-light">
				<tr>
					<th>id          </th> 
					<th>Book Title  </th> 
					<th>Book Name   </th> 
					<th>Book Author </th> 
					<th>			</th> 	
				</tr>
			</thead>
			<tbody>
				<?php foreach ($row as $key => $value):  ?>
				<tr>
					<td> <?= $row[$key]['id'] ?>	</td>
					<td> <?= $row[$key]['book_title'] ?>	</td>
					<td> <?= $row[$key]['book_name'] ?>	</td>
					<td> <?= $row[$key]['book_author'] ?>	</td>
					<td> 
						<img width="150" height="180" src="<?= DOCROOT.'/assets/images/books/'.$row[$key]['image'] ?>">
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	<?php endif; ?>
	<div id="dynDiv"></div>
</div>
<?php elseif( isset($_GET['p']) && $_GET['p'] === 'request'): ?>
	<h3 class="text-center font-weight-light mb-5">Request A New Book</h3>
	<form action=" <?= DOCROOT."/classes/library.class.php"; ?>" method="POST" class="form-group">
		<input type="text" name="book_name" placeholder="Enter Book Name" class="form-control col-md-4 offset-md-4 mt-2" required="required">
		<input type="text" name="book_author" placeholder="Enter Book Author" class="form-control col-md-4 offset-md-4 mt-2" required="required">
		<input type="hidden" name="requested_by" value=" <?= $_SESSION['name'][0]->user_reg; ?>" >
		<input type="submit" name="submit" class="form-control col-md-4 offset-md-4 btn btn-success mt-2">
	</form>
	<div id="msg"></div>
<?php endif; ?>

<script type="text/javascript" src="<?= DOCROOT.'/assets/js/library.js'; ?>"></script>