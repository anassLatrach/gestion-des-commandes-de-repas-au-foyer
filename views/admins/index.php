<div class="container">
    <h3>Users</h3>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>nom et prenom</th>
                <th>email</th> 
                <th>Action</th>              
                 

            </tr>
        </thead>
        <tbody>
        <?php foreach($viewmodel as $item) : ?>
            <tr>
                <td><?php echo $item['ID_user']; ?></td>
                <td> <?php echo $item['nomUser']." ".$item['prenomUser']; ?> </td>
                <td><?php echo $item['email']; ?></td>
                <td><a href="<?php echo ROOT_PATH; ?>admins/annuler/<?php echo $item['ID_user']; ?>" class="btn btn-default btn-sm" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));"><i class="fa fa-times"></i> annuler</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>objet</th>
                <th>reponses</th>
                <!--<th>Date de la reponse</th>-->
                <th>Nom et Prenom</th>
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