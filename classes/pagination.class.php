<?php 
require_once("database.class.php");
class Pagination{
	private $page_no;
	private $start; 		
	private $limit;
	private $table; 		
	private $total_pages; 		
	public  $DB;
	public function set($page_no,$limit,$table){
		$this->page_no = $page_no;
		$this->limit   = $limit;
		$this->table   = $table;
	}
	function __construct(PDO $db){
		$this->DB      = $db;
	}
	function queryBuilder($query,array $arr = NULL){
		$stmt   = $this->DB->prepare($query);
		if($arr != NULL)
			$res 	= $stmt->execute($arr);
		else
			$res 	= $stmt->execute();
		return [
				$stmt->execute($arr),
				$stmt
			   ];
	}
	function displayCurrentResults(){
		$res    = $this->queryBuilder("SELECT *FROM $this->table");
		$stmt   = $res[1]; 
		$res    = $res[0];
		$this->total_pages = $stmt->rowcount()/$this->limit;
		// echo "total_pages:".$this->total_pages."<br>";echo "Start:".$this->start."<br>";echo "End:".$this->limit."<br>";echo "page number GEt:".$this->page_no."<br>";
		$this->start       = ceil( ($this->page_no - 1)*$this->limit );
		$res    = $this->queryBuilder("SELECT *FROM $this->table LIMIT $this->start,$this->limit");
		$stmt   = $res[1];
		while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
			return $row;
		}
	}
	function paginate(){
		for ($page=1; $page <= $this->total_pages ; $page++) :?>
			<a href="?page=<?=$page?>"> <?= $page ?></a>	
		<?php endfor;
	}

}
// $table = 'wordpress';
// $db    = new Database(HOST,USER,PASSWORD,$table);
// $pag   = new Pagination($db->make());
// $pag->set
// 		(
// 			$_GET['page'], //page_no
// 			20,
// 			'wp_options'
// 		);
// $pag->displayCurrentResults();
// $pag->paginate();














