<?php require_once('header.php'); require_once('lib/simple_html_dom.php')?>
<div class="row-fluid" id="loading">
	<div class="span4">
		<h4>Loading</h4>
		<div class="progress progress-striped active">
	  	<div class="bar"></div>
		</div>
	</div>
</div>
<div class="row-fluid hide" id="gear">
	<div class="span2" id="sidebar">
	  <div class="well sidebar-nav">
	    <ul class="nav nav-list">
	      <li class="nav-header">Sidebar</li>
	      <li class="active"><a href="#">Link</a></li>
	      <li><a href="#">Link</a></li>
	      <li><a href="#">Link</a></li>
	      <li><a href="#">Link</a></li>
	      <li class="nav-header">Sidebar</li>
	      <li><a href="#">Link</a></li>
	      <li><a href="#">Link</a></li>
	      <li><a href="#">Link</a></li>
	      <li><a href="#">Link</a></li>
	      <li><a href="#">Link</a></li>
	      <li><a href="#">Link</a></li>
	      <li class="nav-header">Sidebar</li>
	      <li><a href="#">Link</a></li>
	      <li><a href="#">Link</a></li>
	      <li><a href="#">Link</a></li>
	    </ul>
	  </div>
	</div>
	<div class="span10">
		<ul class="thumbnails">
			<li class="span3 hide item">		
				<div class="thumbnail">
	    	  <img class="image" src="" alt="">
	    	  <div class="caption">
	    	    <h5 class="product"></h5>
	    	    <p class="info"></p>
	    	    <div class="btn-group">
						  <button class="btn buy" data-product="" data-url="" data-company="">Buy <span class="price"></span></button>
						  <?php /*
						  <button class="btn dropdown-toggle" data-toggle="dropdown">
						    <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu">
						    <li><a href=""></a></li>
						    <li class="divider"></li>
						  </ul>
						  */ ?>
						</div>
	    	  </div>
	    	</div>
			</li>
		</ul>
	</div>
</div>
<div class="row-fluid hide" id="about">
	<div class="span12">
          <div class="hero-unit">
            <h1>Hello, Audiophiles!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
          </div>
        </div><
</div>
<div class="modal hide" id="disclaimer">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3 id="title"></h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
    <a href="#" class="btn btn-primary">Save changes</a>
  </div>
</div>
<?php require_once('footer.php');?>