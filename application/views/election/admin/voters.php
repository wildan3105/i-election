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
		position:relative;
		margin: 10px;
		border: 1px solid #D0D0D0;
		width: 40%;
		height: 20%;
		left: 30%;
		top: 45%;
		-webkit-box-shadow: 0 0 10px #D0D0D0;
	}
	
	#option{
		position:relative;
		padding: 10px;
		width: 90%;
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 10px #D0D0D0;
	}
	
	#logo{
		position: relative;
		left: 90%;
		top: 90%;
	}
	</style>
</head>
<body>
<div align="left">
<table width="50%" >
<h1 align="left"><?=$title?></h1>
<thead>
<tr><th>ID</th><th>NIS</th><th>Menggunakan Hak Suara</th></tr>
<tr><th colspan=3><hr color=#EEEEEE></th></tr>
</thead>
<tbody>
<? $c=0; $x=0;?>
<?foreach ($r as $a){?>
<? $c++;?>
<?if ($a['D']=='1'){?>
<tr><td><?=$a['A']?></td><td><?=$a['B']?></td><td>Ya</td>
<?}else{?>
<tr bgcolor=#FF8888><td><?=$a['A']?></td><td><?=$a['B']?></td><td>Tidak</td>
<? $x++ ?>
<?}}?>
</tbody>
</table>
<hr color=#EEEEEE>
Pemilik Hak Suara: <?=$c?> <br>
Tidak Menggunakan Hak Suara: <?=$x?> (<?=round($x/$c*100,2)?>%)
</div>
</body>
</html>
