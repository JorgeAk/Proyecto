<!DOCTYPE HTML>

<html>
	<head>
		<title>Pagina demo</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Resources/CSS/main.css" />
		<noscript><link rel="stylesheet" href="Resources/CSS/noscript.css" /></noscript>
       
        
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				
					<header id="header">
						<h1>LaraCode</h1>
						<p>Bienvenido &nbsp;&bull;&nbsp; Esqueleto de  &nbsp;&bull;&nbsp;Proyecto</p>
						<nav>
							<ul>
								
								<li><a href="#" class="icon fa-terminal"><span class="label">Consulta</span></a></li>
								<li><a href="Resources/Views/prueba.php" class="icon fa-table"><span class="label">Tabla</span></a></li>
							</ul>
						</nav>
					</header>
               </div>
		</div>
        
		<script>
			window.onload = function() { document.body.classList.remove('is-preload'); }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; 
            }
		</script>
	</body>
</html>