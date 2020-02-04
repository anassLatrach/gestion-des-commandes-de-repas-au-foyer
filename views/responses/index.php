<div class="container">
    <h3>Messages</h3>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>objet</th>
                <th>message</th>
                <th>Date du message</th>
                <th>Nom et Prenom</th>
                <th>etat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($viewmodel as $item) : ?>
            <tr>
                <td><?php echo $item['ID_message']; ?></td>
                <td><?php echo $item['objet']; ?></td>
                <td><?php echo $item['message']; ?></td>
                <td><?php echo $item['dateDebut']; ?></td>
                <td><?php echo $item['nomUser']." ".$item['prenomUser']; ?></td>
                <td><span>
								<?php  if ($item['etat'] == "ouvert" ){?>  
								<span  class="btn btn-success btn-circle"></span> <i>ouvert</i>
								<?php }else if($item['etat'] == "fermer" ){ ?>
								<span  class="btn btn-danger btn-circle"></span> <i>fermer</i>
								<?php }else if($item['etat'] == "annuler" ){ ?>
								<span  class="btn btn-warning btn-circle"></span> <i>annuler</i><?php } else if($item['etat'] == "en traitement" ){ ?>
                                <span  class="btn btn-primary btn-circle"></span> <i>en traitement</i><?php }?></span>
                        </td>
                <td><a href="<?php echo ROOT_PATH; ?>responses/answer/<?php echo $item['ID_message']; ?>">anwser</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>objet</th>
                <th>message</th>
                <th>Date du message</th>
                <th>Nom et Prenom</th>
                <th>etat</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
    <script>
    $(document).ready(function() {
    $('#example2').DataTable();
} );
    </script>