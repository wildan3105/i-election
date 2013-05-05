<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="<?=base_url('/resources/style.css')?>" />
</head>
<body background="<?=base_url('resources/greenlight.jpg')?>">
<h1 align="left"><?=$title?></h1>
<div id="container" align="center">
	<div id="body">
		<h1>Login</h1>
		<?=form_open("index.php?/election/sign")?>
		<table><tbody>
		<tr><td>NIS</td><td><?=form_input('nis','')?></td></tr>
		<tr><td>Password</td><td><?=form_password('pass','')?></td></tr>
		<tr><td colspan=2 align="right"><?=form_submit('submit', 'Login')?></td></tr>
		</tbody></table>
		<?=form_close()?>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds | <a href="index.php?/election/admin_login">administrator panel</a>
	</p>
</div>
<div id="logo"><img width="30%" height="30%" src="<?=base_url("/resources/gogreen.png");?>" ></div>
</body>
</html>