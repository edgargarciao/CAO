<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["country_id"])) {
	$query ="SELECT  cur.* 
				FROM mdl_course cur 
		  INNER JOIN mdl_course_categories scat ON scat.id = cur.category    
		  INNER JOIN mdl_course_categories cat ON cat.id = scat.parent 
		  WHERE cat.id = '".$_POST["country_id"]."'";

	$results = $db_handle->runQuery($query);
	
	if($results != null){
	foreach($results as $state) {
		$id = $state['id'];
	    $category = $state['category'];
		$fullname = utf8_encode($state['fullname']);
		$shortname = utf8_encode($state['shortname']);
		echo '<tr id="tr-'.$id.'" >';		
		echo '<td>'.$id.'</td>';
		echo '<td>'.$category.'</td>';
		echo '<td>'.$fullname.'</td>';
		echo '<td>'.$shortname.'</td>';
		echo '<td> <label class="switch"> <input id="ch-'.$id.'" type="checkbox" onclick="onClickHandler(this.id)" checked> <span class="slider round"></span> </label></td>';
		echo '</tr>';
        
	}
     }
}
?>