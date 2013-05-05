<!DOCTYPE html>

<?php
$opsi1 = array(
    'name'        => 'vote',
    'id'          => 'o1',
    'value'       => '1',
    'style'       => 'margin:10px',
    );
$opsi2 = array(
    'name'        => 'vote',
    'id'          => 'o2',
    'value'       => '2',
    'style'       => 'margin:10px',
    );
?>

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
	h2 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #F0F0F0;
		font-size: 17px;
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
		padding: 20px 20px 20px 20px;
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
		position: absolute;
		left: 80%;
		top: 80%;
	}
	</style>

	<script type="text/javascript" src="<?=base_url("/resources/jsapi.js");?>"></script>
	<script type="text/javascript">
		google.load("jquery", "1.4.4");
	</script>
	<script type="text/javascript" src="<?=base_url("/resources/highcharts.js");?>"></script>

</head>

<body>
	<h1><?=$title?></h1>
	<div id="container" align="center" >
	<?=form_open_multipart("/index.php?/election/do_add_candidate")?>
		<table>
		<tbody>
		<tr><td>Nama</td><td><?=form_input('nama')?></td></tr>
		<tr><td>Foto</td><td><?=form_upload('foto')?></td></tr>
		<tr><td colspan=2><?=form_submit('add', 'add')?></td></tr>
		</tbody>
		</table>
	</form>
	</div>
</body>
</html>