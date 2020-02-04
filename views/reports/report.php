<?php if(isset($_SESSION['is_logged_in'])) : ?>
	<?php foreach($viewmodel as $item) : ?>
<div class="container">
  <div class="well">
      <div class="media">
  		<div class="media-body">
        <h4 class="media-heading">
        <?php echo $item['objet']; ?></h4>
          <p class="text-right"><?php echo $item['dateDebut']; ?></p>
          <p><?php echo $item['message']; ?> </p>
          <ul class="list-inline list-unstyled">
              <li><span>
								<?php  if ($item['etat'] == "ouvert" ){?>  
								<span  class="btn btn-success btn-circle"></span> <i>ouvert</i>
								<?php }else if($item['etat'] == "fermer" ){ ?>
								<span  class="btn btn-danger btn-circle"></span> <i>fermer</i>
								<?php }else if($item['etat'] == "annuler" ){ ?>
								<span  class="btn btn-warning btn-circle"></span> <i>annuler</i><?php } else if($item['etat'] == "en traitement" ){ ?>
								<span  class="btn btn-primary btn-circle"></span> <i>en traitement</i><?php }?></li></span>  
                           
			</ul>
       </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h2 class="page-header">Answers</h2>
        <section class="comment-list">
          <article class="row"> 
            <div class="col-md-12 col-sm-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> <?php echo $item['nomUser']." ".$item['prenomUser']; ?></div>
                    <time class="comment-date" ><i class="fa fa-clock-o"></i> Dec 16, 2014</time>
                  </header>
                  <div class="comment-post">
                    <p>
                    <?php echo $item['reponses']; ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </article>
        </section>
    </div>
  </div>
</div>
<?php endforeach; ?>
<?php else :?>
  <?php echo "no answer"; ?>
<?php endif; ?>

<style>
/*font Awesome http://fontawesome.io*/
@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
/*Comment List styles*/
.comment-list .row {
  margin-bottom: 0px;
}
.comment-list .panel .panel-heading {
  padding: 4px 15px;
  position: absolute;
  border:none;
  /*Panel-heading border radius*/
  border-top-right-radius:0px;
  top: 1px;
}
.comment-list .panel .panel-heading.right {
  border-right-width: 0px;
  /*Panel-heading border radius*/
  border-top-left-radius:0px;
  right: 16px;
}
.comment-list .panel .panel-heading .panel-body {
  padding-top: 6px;
}
.comment-list figcaption {
  /*For wrapping text in thumbnail*/
  word-wrap: break-word;
}
/* Portrait tablets and medium desktops */
@media (min-width: 768px) {
  .comment-list .arrow:after, .comment-list .arrow:before {
    content: "";
    position: absolute;
    width: 0;
    height: 0;
    border-style: solid;
    border-color: transparent;
  }
  .comment-list .panel.arrow.left:after, .comment-list .panel.arrow.left:before {
    border-left: 0;
  }
  /*****Left Arrow*****/
  /*Outline effect style*/
  .comment-list .panel.arrow.left:before {
    left: 0px;
    top: 30px;
    /*Use boarder color of panel*/
    border-right-color: inherit;
    border-width: 16px;
  }
  /*Background color effect*/
  .comment-list .panel.arrow.left:after {
    left: 1px;
    top: 31px;
    /*Change for different outline color*/
    border-right-color: #FFFFFF;
    border-width: 15px;
  }
  /*****Right Arrow*****/
  /*Outline effect style*/
  .comment-list .panel.arrow.right:before {
    right: -16px;
    top: 30px;
    /*Use boarder color of panel*/
    border-left-color: inherit;
    border-width: 16px;
  }
  /*Background color effect*/
  .comment-list .panel.arrow.right:after {
    right: -14px;
    top: 31px;
    /*Change for different outline color*/
    border-left-color: #FFFFFF;
    border-width: 15px;
  }
}
.comment-list .comment-post {
  margin-top: 6px;
}

.btn-circle {
  width: 12px;
  height: 12px;
  text-align: center;
  padding: 6px 0;
  font-size: 6px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>