<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		text-decoration:none;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		position:relative;
		margin: 10px;
		border: 1px solid #D0D0D0;
		width: 40%;
		height: 20%;
		left: 30%;
		top: 20%;
		-webkit-box-shadow: 0 0 10px #D0D0D0;
	}
	
	#logo{
		position: relative;
		left: 90%;
		top: 90%;
	}

	#ICES{
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	</style>
</head>
<body>
<a href="../../"><h1><?=$title?></h1></a>
<div id="container" align="center">
	<div id="body">
		<h1>Administrator Login</h1>
		<?=form_open("index.php?/election/admin_sign")?>
		<table><tbody>
		<tr><td>Username</td><td><?=form_input('username','')?></td></tr>
		<tr><td>Password</td><td><?=form_password('pass','')?></td></tr>
		<tr><td colspan=2 align="right"><?=form_submit('submit', 'Login')?></td></tr>
		</tbody></table>
		<?=form_close()?>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds
	</p>
</div>
<div id="logo"><img width="84" height="64" src="<?=base_url("/resources/gogreen.jpg");?>" ></div>
</body>
</html>
