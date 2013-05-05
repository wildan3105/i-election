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
	<script type="text/javascript">
		function validateForm()
		{
			 var radios = document['voting'].elements['vote'];
			 for (var i=0; i <radios.length; i++) {
			  if (radios[i].checked) {
			   return true;
			  }
			 }
			 alert("You're not allowed to abstain.");
			 return false; 
		}
	</script>
</head>
<body>
<h1 align="left"><?=$title?></h1>
<?php
$form = array(
'id'        => 'voting',
'name'        => 'voting',
'onsubmit'=>"return validateForm()"
);
echo form_open('index.php?/election/vote/', $form);
?>
<div align="center">
<table width="80%"><tbody>
<?
		$i=0;
		foreach ($r as $a){
			$opsi = array(
				'name'        => 'vote',
				'id'          => 'o'.$a['id'],
				'value'       => $a['id'],
				'style'       => 'margin:10px',
				);
			$image = array(
				'src' => base_url('index.php?/election/picture/'.$a['id']),
				'width' => '100%',
			);
			if (($i % 2) == 0) echo "<tr>";
			echo "<td> <div id='option'>";
				echo '<font size=4><b>' . $a['partai'] . '</b></font><br>';
				echo '<h2>' . $a['nama'] . '</h2>';
				echo img($image);
				echo '<br>'. form_radio($opsi) . $a['nama'];
			echo "</div></td>";
			if (($i % 2) == 1) echo "</tr>";
			$i++;
		}
		
		if (($i % 2) == 1) echo "</tr>";
?>
<tr><td colspan=2 align="right"><?=form_submit('submit','vote')?></td></tr>
</tbody></table>
</div>
</form>
<div id="logo"><img width="84" height="64" src="<?=base_url("/resources/gogreen.jpg");?>" ></div>
</body>
</html>
