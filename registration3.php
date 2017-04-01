<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
  <title>Risky Jobs - Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <img src="riskyjobs_title.gif" alt="Risky Jobs" />
  <img src="riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right" />
  <h3>Рискованные работы - Регистрация</h3>

<?php
  if (isset($_POST['submit'])) {
    $title= $_POST['title'];
    $description = $_POST['description'];
	$city = $_POST['city'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $resume = $_POST['resume'];
    $output_form = 'no';

    if (empty($first_name)) {
      // $first_name is blank
      echo '<p class="error">You forgot to enter your first name.</p>';
      $output_form = 'yes';
    }

    if (empty($last_name)) {
      // $last_name is blank
      echo '<p class="error">You forgot to enter your last name.</p>';
      $output_form = 'yes';
    }

    if (empty($email)) {
      // $email is blank
      echo '<p class="error">You forgot to enter your email address.</p>';
      $output_form = 'yes';
    }

    if (empty($phone)) {
      // $phone is blank
      echo '<p class="error">You forgot to enter your phone number.</p>';
      $output_form = 'yes';
    }

    if (empty($job)) {
      // $job is blank
      echo '<p class="error">You forgot to enter your desired job.</p>';
      $output_form = 'yes';
    }

    if (empty($resume)) {
      // $resume is blank
      echo '<p class="error">You forgot to enter your resume.</p>';
      $output_form = 'yes';
    }
  }
  else {
    $output_form = 'yes';
  }

  if ($output_form == 'yes') {
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <p>Register with Risky Jobs, and post your resume.</p>
  <table>
    <tr>
      <td><label for="title">Название работы:</label></td>
      <td><input id="title" name="title" type="text" value="<?php if (!empty($title) ){ echo $title;} ?>"/></td></tr>
    <tr>
      <td><label for="description">Описание:</label></td>
      <td><input id="description" name="description" type="text" value="<?php if (!empty($description)){ echo $description;}   ?>"/></td>
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
      <td><label for="job">Желаемая работа:</label></td>
      <td><input id="job" name="job" type="text" value="<?php if (!empty($job)){ echo $job;}   ?>"/></td>
  </tr>
  </table>
  <p>
    <label for="resume">Вставте ваше резюме здесь:</label><br />
    <textarea id="resume" name="resume" rows="4" cols="40"><?php if(!empty($resume)){ echo $resume; }?></textarea><br />
    <input type="submit" name="submit" value="Submit" />
  </p>
</form>

<?php
  }
  else if ($output_form == 'no') {
    echo '<p>' . $title . ' ' . $description . ', thanks for registering with Risky Jobs!</p>';

    // code to insert data into the RiskyJobs database...
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$query = "INSERT INTO riskyjobs VALUES($title, $description, $city,NULL,NULL,NULL)";
	mysqli_query($dbc, $query);
	mysqli_close($dbc);
  }
?>

</body>
</html>
