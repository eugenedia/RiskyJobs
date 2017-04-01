<?php
// Grab the sort setting and search keywords from the URL using GET
$search_query="SELECT * FROM riskyjobs";

$where_clause = ' ';

// $sort = $_GET['sort'];
$user_search = $_GET['usersearch'];

$search_words=explode(' ',$user_search);

foreach( $search_words as word){
	$where_list[] = "description LIKE '%$word%'";
}

?>