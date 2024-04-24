<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Interest</title>
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/theme.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <a class="navbar-brand font-weight-bolder mr-3" href="index.php"><img src="assets/img/logo1.jpg" width="35" height="40"></a>
    <h5 class=" font-weight-bold navbar-brand" href="index.php">Interest</h5>
    <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsDefault">
    	<ul class="navbar-nav mr-auto align-items-center">
    		<form class="bd-search hidden-sm-down">
    			<input type="text" class="form-control bg-graylight border-0 font-weight-bold" id="search-input" placeholder="Pencarian..." autocomplete="off">
    			<div class="dropdown-menu bd-search-results" id="search-results">
    			</div>
    		</form>
    	</ul>
    	<ul class="navbar-nav ml-auto align-items-center">
    		<li class="nav-item">
    		<a class="nav-link active" href="index.php">Home</a>
    		</li>
    		<li class="nav-item">
    		<a class="nav-link" href="post.php">Post</a>
    		</li>
    		<li class="nav-item">
    		<a class="nav-link" href="author.php"><img class="rounded-circle mr-2" src="assets/img/av.png" width="30"><span class="align-middle"><?php echo $_SESSION['username'];?></span></a>
    		</li>
			<li class="nav-item dropdown">
    		<a class="nav-link" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    		<svg style="margin-top:10px;" class="_3DJPT" version="1.1" viewbox="0 0 32 32" width="21" height="21" aria-hidden="false" data-reactid="71"><path d="M7 15.5c0 1.9-1.6 3.5-3.5 3.5s-3.5-1.6-3.5-3.5 1.6-3.5 3.5-3.5 3.5 1.6 3.5 3.5zm21.5-3.5c-1.9 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5 3.5-1.6 3.5-3.5-1.6-3.5-3.5-3.5zm-12.5 0c-1.9 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5 3.5-1.6 3.5-3.5-1.6-3.5-3.5-3.5z" data-reactid="22"></path></svg>
    		</a>
    		<div class="dropdown-menu dropdown-menu-right shadow-lg" aria-labelledby="dropdown02">
			<a class="nav-link" href="logout.php">Logout</a>
    		</div>
    		</li>
    	</ul>
    </div>
    </nav>    
    <main role="main">
         
    
    <section class="mt-4 mb-5">
    <div class="container mb-4">
    	<h1 class="font-weight-bold title">Jelajahi Foto</h1>
    	<div class="row">
    		<nav class="navbar navbar-expand-lg navbar-light bg-white pl-2 pr-2">
    		<button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExplore" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
    		</button>
    		<div class="collapse navbar-collapse" id="navbarsExplore">
    			<ul class="navbar-nav">
    				<li class="nav-item">
    				<a class="nav-link" href="#">Gaya Hidup</a>
    				</li>
    				<li class="nav-item">
    				<a class="nav-link" href="#">Makanan</a>
    				</li>
    				<li class="nav-item">
    				<a class="nav-link" href="#">Arsitektur</a>
    				</li>
    				<li class="nav-item">
    				<a class="nav-link" href="#">Satwa</a>
    				</li>
    				<li class="nav-item dropdown">
    				<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lainnya</a>
    				<div class="dropdown-menu shadow-lg" aria-labelledby="dropdown01">
    					<a class="dropdown-item" href="#">Astronomi</a>
    					<a class="dropdown-item" href="#">Alam</a>
    					<a class="dropdown-item" href="#">Perjalan</a>
    					<a class="dropdown-item" href="#">Fashion</a>
    					<a class="dropdown-item" href="#">Seni Rupa</a>
    					<a class="dropdown-item" href="#">Bawah Laut</a>
    				</div>
    				</li>
    			</ul>
    		</div>
    		</nav>
    	</div>
    </div>
    
    <div class="container-fluid">
    	<div class="row">
    		<div class="card-columns">
    			<div class="card card-pin">
    				<img class="card-img" src="assets/img/logo1.jpg" alt="Card image">
    				<!-- <div class="overlay">
    					<h2 class="card-title title">Cool Title</h2>
    					<div class="more">
    						<a href="post.html">
    						<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
    					</div>
    				</div> -->
					<div class="card-footer text-center">
						<a href="">10 Suka</a>
						<a href="">3 komentar</a>
					</div>
    			</div>
    		</div>
    	</div>
    </div>
    </section>
        
    </main>

    <script src="assets/js/app.js"></script>
    <script src="assets/js/theme.js"></script>
    
    <footer class="footer pt-5 pb-5 text-center">
        
    <div class="container">
          <p>©  <span class="credits font-weight-bold">        
            <u>Interest 2024</u> by WowThemes.net.</u>
          </span>
          </p>
    
        </div>
        
    </footer>    
</body>
    
</html>