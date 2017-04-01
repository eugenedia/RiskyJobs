<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
  <title>Risky Jobs - Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrapperPHP">

	<div id="bannerPHP">
  <img src="riskyjobs_title.gif" alt="Risky Jobs" />
  <img src="riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right" />
  </div>

  <div id="mainPHP">
  <h3>Добавить работу</h3>

<?php
  require_once('connectvars.php');

  if (isset($_POST['submit'])) {

	$title= $_POST['title'];
	
	/*foreach($_POST AS $key=> $value)
			{ echo $key . '=>' . $value. '</br>'; }*/
    //$description = $_POST['description'];
	$city = $_POST['city'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $output_form = 'no';

    if (empty($title)) {
      // $first_name is blank
      echo '<p class="error">You forgot to enter your first name.</p>';
      $output_form = 'yes';
    }

	//echo $title.$description.$city;
    if (empty($description)) {
      // $last_name is blank
      echo '<p class="error">You forgot to enter your last name.</p>';
      $output_form = 'yes';
    }

	if (empty($city)) {
      // $job is blank
      echo '<p class="error">You forgot to enter your desired job.</p>';
      $output_form = 'yes';
    }



  }
  else {
    $output_form = 'yes';
  }

  if ($output_form == 'yes') {
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

  <table>
    <tr>
      <td><label for="title">Название работы:</label></td>
      <td><input id="title" name="title" type="text" value="<?php if (!empty($title) ){ echo $title;} ?>"/></td></tr>
    <tr>
      <td><label for="description">Вставить описание работы:</label></td>
    <td><textarea id="description" name="description" rows="4" cols="40"><?php if(!empty($resume)){ echo $resume; }?></textarea></td>


  </tr>
	<tr>
      <td><label for="city">Город:</label></td>
      <td><input id="city" name="city" type="text" value="<?php if (!empty($city)) { echo $city;} ?>"/></td></tr>
    <tr>
      <td><label for="email">Email:</label></td>
      <td><input id="email" name="email" type="text" value="<?php if (!empty($email)) { echo $email;} ?>"/></td></tr>
    <tr>
      <td><label for="phone">Телефон:</label></td>
      <td><input id="phone" name="phone" type="text" value="<?php if (!empty($phone)){ echo $phone;} ?>"/></td></tr>
		<tr>
		<td><label for="verify"> Проверка: </label> </td>
		<td><input type="text" id="verify" name="verify" value="Введите идентификационную фразу"/>
		<img src = "captcha.php" alt="Проверка идентификационной фразы" />
		</td>
  </table>
<input type="submit" name="submit" value="Добавить работу "  />
</form>

<?php



  }
  else if ($output_form == 'no') {

	$user_pass_phrase = sha1($_POST['verify']);
	if ($_SESSION['pass_phrase'] == $user_pass_phrase)
	{
    // code to insert data into the RiskyJobs database...
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
					

	//mysqli_query($dbc,'SET character_set_database = cp1251');
	//mysqli_query($dbc,'SET NAMES cp1251');
	//$query = "INSERT INTO riskyjobs (title,description,city) VALUES('$title', '$description', '$city')";
	$query = "INSERT INTO riskyjobs VALUES(0,'$title', '$description', '$city', NULL, NULL, NULL,NOW())";
	mysqli_query($dbc, $query)
		or die ('Ошибка выполнения запроса к базе данных');
	mysqli_close($dbc);
		echo '<p>' . $title . ' ' . $description . ', thanks for registering with Risky Jobs!</p>';

	}
	else 
	echo "Введите правильно captcha";
  }
?>
</div>
</div>
</body>
</html>
