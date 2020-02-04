<?php if(isset($_SESSION['is_logged_in'])) : ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Report Something!</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    	<div class="form-group">
    		<label>Object :</label>
    		<input type="text" name="objet" class="form-control" />
    	</div>
    	<div class="form-group">
    		<label>Message :</label>
    		<textarea name="message" class="form-control"></textarea>
    	</div>
    	<div class="form-group">
    		<input type="hidden" name="idUser" value="<?= $_SESSION['user_data']['id']?>" />
    	</div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
        <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
    </form>
  </div>
</div>
<?php endif; ?>