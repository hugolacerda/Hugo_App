<h1>Home</h1>
<h2>Welcome <?php echo $username; ?>!</h2>
<a href="home/logout">Logout</a>
 
<li class="dropdown">
	<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
		<b class="caret"><?php echo $username; ?></b>
	</a> 
	<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		<li>My Top5</li>
		<li><a href="home/logout">Logout</a></li>
	</ul>
</li>

<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>

<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>