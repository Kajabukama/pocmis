<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  	<a class="navbar-brand" href="#">PoCMIS</a>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active"><a class="nav-link" href="#">Dashboard</a></li>
	    </ul>
	    <span class="text-muted">
	    	<?php
		    	echo "Welcome , logged as ".$username . " <a class='ml-3' href='../logout.php?value=logout'>Signout</a> ";
		    ?>
	    </span>
	    <span class="ml-2"><i class="far fa-user-circle medium"></i></span>
	  </div>
  </div>
</nav>