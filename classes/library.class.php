<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/database.class.php");
require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/file_upload.class.php");
require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/config.php");
class Library{
	
	public $DB;
	public $file;
	public function getAll(){
		$stmt = $this->DB->prepare("SELECT *FROM library ORDER BY id DESC");
		$stmt->execute( );
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getRequests(){
		if( isset( $_SESSION['name'][0]->name ) == 'admin' ){
			$stmt = $this->DB->prepare("SELECT *FROM book_request ORDER BY id DESC");
			$stmt->execute( );
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}else{
			return "not admin";
		}
	}
	public function insert($title,$author,$name,$loc){
		// $loc  = $_SERVER['DOCUMENT_ROOT'].'/assets/images/books/';
		$file = new Upload( $_FILES['b_img'] , $loc);
		$loc  = $file->upload();
		
		$stmt = $this->DB->prepare("INSERT INTO library(book_title,book_name,book_author,image) VALUES(?,?,?,?)");
		return $stmt->execute([$title,$name,$author,$loc]);
	}

	public function delete($id) {
		$stmt = $this->DB->prepare("DELETE FROM library WHERE id=?");
		$stmt->execute( [$id] );
		return $stmt->rowCount();
	}

	public function renderDelete(){
		//display all books + remove button
		$row = $this->getAll(); 
		?>
		<table class="table table-hover">
			<thead class="th-light">
				<tr>
					<th>  Id     </th>
					<th>  Title  </th>
					<th>  Name   </th>
					<th>  Author </th>
					<th>  Image  </th>
					<th>  Action  </th>
				</tr>
			</thead>
			<tbody>
				
				<?php for ( $i=0 ; $i < sizeof($row); $i++ ): ?>
				<tr>
					<td> <?php echo $row[$i]['id'];          ?> </td>
					<td> <?php echo $row[$i]['book_title'];  ?> </td>
					<td> <?php echo $row[$i]['book_name'];   ?> </td>
					<td> <?php echo $row[$i]['book_author']; ?> </td>
					<td>
						<img width="150px" src =" <?= DOCROOT.'/assets/images/books/'.$row[$i]['image'];?>">
					</td>
					<td>
					 <a href=" <?= $_SERVER['PHP_SELF'].'?p=delete&delete_book='.$row[$i]['id']; ?> " class="btn btn-danger btn-sm">Delete</a> 
					</td>
				</tr>
			<?php endfor; ?>
			</tbody>
		</table><?php 
	}
	public function bookRequest($b_name,$author,$req_by){
		$stmt = $this->DB->prepare("INSERT INTO book_request(book_name,author,requested_by,date) VALUES(?,?,?,CURDATE())");
		$stmt->execute( [$b_name,$author,$req_by] );
		return $stmt->rowCount();
	}
	public function searchLibrary($q){
		$stmt = $this->DB->prepare("SELECT *FROM library WHERE book_name LIKE  ? ");
		$stmt->execute( [ '%'.$q.'%' ] );
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function deleteBookRequest($id){
		$stmt = $this->DB->prepare("DELETE FROM book_request WHERE id = ?");
		$stmt->execute( [$id] );
		return $stmt->rowCount();
	}
	function __construct(PDO $pdo){
		$this->DB = $pdo;
	}

}

$db = new Database( HOST,USER,PASSWORD,'hostel' );
$ob = new Library( $db->make() );

if( 
	isset( $_FILES['b_img']   )   &&
	isset( $_POST['b_title']  )   &&
	isset( $_POST['b_author'] )   &&
	isset( $_POST['b_name']   )                 
  ){
		$loc = $_SERVER['DOCUMENT_ROOT'].'/projects/hostel/assets/images/books/';
		if ( $ob->insert( $_POST['b_title'],$_POST['b_author'],$_POST['b_name'],$loc ) ){
				$loc = $_SERVER['HTTP_REFERER'].'&msg=yes';
				header("Location: ".$loc);
		}
}
elseif( isset( $_GET['delete_book'] )){

	$ob->delete( $_GET['delete_book'] );

}elseif( isset($_POST['searchQuery']) && 
		 isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	
	if( $_SERVER['HTTP_X_REQUESTED_WITH'] === "searchForm"  ){
		$res = $ob->searchLibrary( $_POST['searchQuery'] );
		echo json_encode($res);
	}

}elseif ( 
		   isset( $_POST['submit']       )
		&& isset( $_POST['requested_by'] ) 
		&& isset( $_POST['book_author']  ) 
		&& isset( $_POST['book_name']    )
) {
		if ($ob->bookRequest($_POST['book_name'],$_POST['book_author'],$_POST['requested_by']) ){
			$loc = $_SERVER['HTTP_REFERER'];
			if (preg_match('/msg=yes/', $loc) ){
				header("Location: ".$loc);
			}else{
				header("Location: ".$loc.'&msg=yes');
			}
		}
}elseif( isset($_GET['p']) && $_GET['p'] === 'requests' && isset($_GET['delete']) ){
	if ( $ob->deleteBookRequest( $_GET['delete'] ) ){
		$loc = $_SERVER['HTTP_REFERER'];
		header("Location: ".$loc);
	}
	// echo $_GET['delete'];
}








































 ?>