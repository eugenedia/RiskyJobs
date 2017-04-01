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
		
		</td>
  </table>
<input type="submit" name="submit" value="Добавить работу "  />
</form>