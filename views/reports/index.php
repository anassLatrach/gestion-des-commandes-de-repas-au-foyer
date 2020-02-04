<?php if(isset($_SESSION['is_logged_in'])) : ?>
	<a class="btn btn-danger btn-share" href="<?php echo ROOT_PATH; ?>reports/add">Send a report</a>

	<?php foreach($viewmodel as $item) : ?>
<div class="container">
  <div class="well">
      <div class="media">
  		<div class="media-body">
        <h4 class="media-heading"><a href="<?php echo ROOT_PATH; ?>reports/report/<?php echo $item['ID_message']; ?>">
        <?php echo $item['objet']; ?></a></h4>
          <p class="text-right"><?php echo $item['dateDebut']; ?></p>
          <p><?php echo $item['message']; ?> </p>
          <ul class="list-inline list-unstyled">
              <li><span>
								<?php  if ($item['etat'] == "ouvert" ){?>  
								<span  class="btn btn-success btn-circle"></span> <i>ouvert</i>
								<?php }else if($item['etat'] == "fermer" ){ ?>
								<span  class="btn btn-danger btn-circle"></span> <i>fermer</i>
								<?php }else if($item['etat'] == "annuler" ){ ?>
                <span  class="btn btn-warning btn-circle"></span> <i>annuler</i>
                <?php } else if($item['etat'] == "en traitement" ){ ?>
								<span  class="btn btn-primary btn-circle"></span> <i>en traitement</i><?php }?></li></span>  
                           
      </ul>
      <?php  if ($item['etat'] == "ouvert" || $item['etat'] == "en traitement") {?>
      <p class="text-right"><a href="<?php echo ROOT_PATH; ?>reports/annuler/<?php echo $item['ID_message']; ?>" class="btn btn-default btn-sm" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));"><i class="fa fa-times"></i> annuler</a></p>
      <?php }?>
       </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
		<style> 
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

	<?php else : die();?><?php endif; ?>