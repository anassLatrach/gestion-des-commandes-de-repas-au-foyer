<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">answer</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    	<div class="form-group">
    		<label>Reponse :</label>
    		<textarea name="reponse" class="form-control"></textarea>
    	</div>
    	<div class="form-group">
            <input type="hidden" name="idUser" value="<?= $_SESSION['user_data']['id']?>" />
            <input type="hidden" name="idMessage" value="<?= $_GET['id']?>" />
        </div>
        <div class="form-group">
        <select name="etat" id=" " class="selectpicker form-control" >
            <option data-tokens="" value="">Select a Method</option>
            <option data-tokens="fermer" value="3">fermer</option>
            <option data-tokens="en traitement" value="2">en traitement</option>
		</select>
        </div>
        
       
    	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
        <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
    </form>
  </div>
</div>