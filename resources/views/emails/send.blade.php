<html>
<head></head>
<body style="background: black; color: white">
<?php if( isset($content) && isset($content['saudacao']) ){
			foreach ($content['saudacao'] as $saudacao) { ?>
				<h1><?php echo $saudacao;?></h1>
		<?php }
	}
?>


<?php if( isset($content) && isset($content['conteudo']) ){
			foreach ($content['conteudo'] as $conteudo) { ?>
				<p><?php echo $conteudo;?></p>
		<?php }
	}
?>

<br>
<a href="http://wote.test/ativacaoConta/<?php echo $content['ativacao']; ?>">Ativação Conta WOTE</a>
<br>


<?php if(isset($content) && isset($content['conteudo2'])){
			foreach ($content['conteudo2'] as $conteudo) { ?>
				<p><?php echo $conteudo;?></p>
		<?php }
	}
?>
                  
<br>
<br>
<?php if(isset($content) && isset($content['final'])){
			foreach ($content['final'] as $conteudo) { ?>
				<p><?php echo $conteudo;?></p>
		<?php }
	}
?>

</body>
</html>