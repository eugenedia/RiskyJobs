<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
  <title>Опасные работы - Поиск</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script src="./lib/jquery-1.4.min.js" type="text/javascript" charset="windows-1251"></script>
  <script type="text/javascript" src="script.js"></script>
  <style type = "text/css">
	/*#sidebar {
	float: right;
	width: 160px;
	margin-top: 10px;
}	*/
	#MainAndMenu
	{
	float: left;
	width: 760px;
	}
	
	#nav {
		float : left;
		width: 160px;
		margin-top:0px;
		padding-top:0px;
		//margin-left: -590px;
	
	}
	#main {
	//float: right;
	width: 419px;
	padding-left: 10px;
	border-left: 1px dashed #999999;
	margin-left: 160px;
	margin-right: 200px;
	}
	
	#news {
		float: right;
		width: 160px;
	
	}
	
	
	#secondary {
	float: right;
	width: 180px;
	background-color: #294E56;
	}	
	
	</style>
</head>
<body>
	
<div id="wrapperPHP">

	<div id="bannerPHP">
  <img src="riskyjobs_title.gif" alt="Risky Jobs" />
  <img src="riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right; margin-right:30px;" />
  </div>
  
			<div id="registration">
			<a href="./registration.php" >Добавить работу</a>
			</div>
			
			
			<div id="nav">
			<ul>
			<li><a href="index.html" id="homeLink">C++</a></li>
			<li><a href="/features/index.html" id="featureLink">C#</a></li>
			<li><a href="/experts/index.html" id="expertLink">PHP</a></li>
			<li><a href="/quiz/index.html" id="quizLink">Русский</a></li>
			<li><a href="/projects/index.html" id="projectLink">Английский</a></li>
			<li><a href="/horoscopes/index.html" id="horoscopeLink">Horoscopes</a></li>
			</ul>
			</div>
  <div id="mainPHP">
  <div id="photos">
        <div id="photos_inner">
          <img alt="Glendatronix" src="images/images/pozharnyi.jpg" />
          <img alt="Darth Fader" src="images/images/Аквалангист-02.jpg" />
          <img alt="Beau Dandy" src="images/images/Diver2518.JPG" />
          <img alt="Johnny Stardust" src="images/images/basered2.jpg" />
          <img alt="Mo' Fat" src="images/images/Matterhorn.jpg" />
          <img alt="Glendatronix" src="images/images/big_2367_oboi_alpinist.jpg" />
          <img alt="Darth Fader" src="images/images/1740.jpg" />
          <img alt="Beau Dandy" src="images/images/1320300588_alpinizm.jpg" />
		  <img alt="Beau Dandy" src="images/images/6934.jpg" />
		  <img alt="Beau Dandy" src="images/images/site.aspx.jpeg" />
		  <img alt="Beau Dandy" src="images/images/Criteria-for-Medical-Recruitment.jpg" />
		  <img alt="Beau Dandy" src="images/images/Врачи-скорой-промощи.jpg" />
		  <img alt="Beau Dandy" src="images/images/skoraya_251208_580x_kit.jpg" />
		  <img alt="Beau Dandy" src="images/images/1207899777_litovskijj-specnaz.jpg" />
		  <img alt="Beau Dandy" src="images/images/1320300588_alpinizm.jpg" />
		  
          </div>
     </div>
  
  <h3>Поиск опасных работ:</h3>

<?php

function  build_query($user_search, $sort){
	$search_query="SELECT * FROM riskyjobs ";
	$clean_search = str_replace(','  , ' ' , $user_search);
	$search_words=explode(' ',$user_search);

	$final_search_words=array();
if(count($search_words)>0){
	foreach( $search_words as $word){
		if (!empty($word)) {
			$final_search_words[] = $word;
		}

	}
}
	$where_list = array();

	if(count( $final_search_words )>0) {
		foreach($final_search_words as $word){
		$where_list[] ="description LIKE '%$word%' ";
	}

		$where_clause = implode(' OR ', $where_list);

		if (!empty($where_clause)) {
			$search_query .=" where $where_clause";
		}
	}

	switch($sort) {
		case 1:
			$search_query .= " ORDER BY title";
		break;
		case 2:
			$search_query .= " ORDER BY title DESC";
			break;
		case 3:
			$search_query .= " ORDER BY description";
			break;
		case 4:
			$search_query .= " ORDER BY description DESC";
			break;
		
		case 5:
			$search_query .= " ORDER BY city";
			break;
		case 6:
			$search_query .= " ORDER BY city DESC";
			break;
		case 7:
			$search_query .= " ORDER BY date_posted";
			break;
		case 8:
		$search_query .= " ORDER BY date_posted DESC";
			break;
		default:
	}



	return $search_query;
}


function generate_sort_links($user_search, $sort){
	$sort_links = ' ';

	switch($sort)	{
		case 1:
			$sort_links .= '<td width="20%" "><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=2">Наименование работы</а>
			</td >';
			$sort_links .= '<td width="50%""><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=3">Описание</а>
			</td >';
			
			$sort_links .= '<td width="10%" align="center""><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=5">Город</а></td>';
			
			$sort_links .= '<td width="20%" align="center""><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=7">Дата</а></td>';
			break;



		case 3:
			$sort_links .= '<td width="20%" "><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=1">Наименование работы</а>
			</td>';
			$sort_links .= '<td width="50%" "><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=4">Описание</а>
			</td >';
			$sort_links .= '<td width="10%" align="center" "><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=5">Город</а></td>';
			$sort_links .= '<td width="20%" align="center" " ><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=7">Дата</а></td>';
			break;



		case 5:
			$sort_links .= '<td width="20%" "><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=1">Наименование работы</а>
			</td>';
			$sort_links .= '<td width="50%""><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=3">Описание</а>
			</td >';
			$sort_links .= '<td width="10%" align="center" "><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=6">Город</а></td>';
			$sort_links .= '<td width="20%" align="center" "><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=7">Дата</а></td>';
			break;
			
			case 7:
			$sort_links .= '<td width="20%"><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=1">Наименование работы</а>
			</td>';
			$sort_links .= '<td width="50%""><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=3">Описание</а>
			</td >';
			$sort_links .= '<td width="10%" align="center" "><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=5">Город</а></td>';
			$sort_links .= '<td width="20%" align="center" "><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=8">Дата</а></td>';
			break;



		default:
			$sort_links .= '<td width="20%" "><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=1">Наименование работы</а>
			</td>';
			
			$sort_links .= '<td width="50%""><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=3">Описание</а>
			</td >';
			
			$sort_links .= '<td width="10%" align="center""><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=5">Город</а></td>';
			
			$sort_links .= '<td width="20%"  align="center""><a href="'.$_SERVER['PHP_SELF'].
			'?usersearch='.$user_search.'&sort=8">Дата</а></td>';


	}

	return $sort_links;

}
  // Grab the sort setting and search keywords from the URL using GET


 // $where_clause = ' ';

 // $sort = $_GET['sort'];
$user_search = $_GET['usersearch'];

 ISSET($_GET['sort']) ? $sort=$_GET['sort'] : $sort = 0;



$search_query = build_query($user_search,$sort);








  // Start generating the table of results
  echo '<table id = "tablej" width="100%" border="0" cellpadding="2" style="padding-right:20px;">';

#  Generate the search result headings
# echo '<tr class="heading">';
#  // echo '<td>Job Title</td><td>Description</td><td>State</td><td>Date Posted</td>';
#  // echo '</tr>';

echo '<thead>';

	echo generate_sort_links($user_search, $sort);
echo '</thead>';
  // Connect to the database
  require_once('connectvars.php');

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_query($dbc,'SET character_set_database = cp1251');
mysqli_query($dbc,'SET NAMES cp1251');
  // Query to get the results
echo '<tbody>';
  $result = mysqli_query($dbc, $search_query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<tr class="results">';
    echo '<td valign="top" width="20%">' . $row['title'] . '</td>';
    echo '<td valign="top" width="50%">' .substr($row['description'],0,1000) . '</td>';
    echo '<td valign="top" width="10%" align="center">' . $row['city'] . '</td>';
    echo '<td valign="top" width="20%" align="center">' . substr($row['date_posted'],0,10) . '</td>';
    echo '</tr>';
  }
  echo '</tbody>';
  echo '</table>';

  mysqli_close($dbc);
?>
</div>
</div>
</body>
</html>
