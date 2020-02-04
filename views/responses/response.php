<div class="container">
    <h3>Messages</h3>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>objet</th>
                <th>reponses</th>
                <!--<th>Date de la reponse</th>-->
                <th>Nom et Prenom</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($viewmodel as $item) : ?>
            <tr>
                <td><?php echo $item['ID_reponse']; ?></td>
                <td><?php echo $item['objet']; ?></td>
                <td><?php echo $item['reponses']; ?></td>
                <td><?php echo $item['nomUser']." ".$item['prenomUser']; ?></td>
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