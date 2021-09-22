<?php 
include "includes/header.php"; 

$contatti = Contatti::findAll();

?>
<div class="container">
    <div id="corpo">
        <h1>Rubrica contatti</h1>
        <p>Qui sotto è presente la lista contatti registrata nel Database</p>
            <?php if ( $contatti ) { ?>
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($contatti as $contatto) { ?>
                <tr>
                    <td><?php echo $contatto["name"];?></td>
                    <td><?php echo $contatto["secondname"];?></td>
                    <td><?php echo $contatto["email"];?></td>
                    <td><?php echo $contatto["phone"];?></td>
                    <td>
                        <a href="dettaglio-contatto.php?id=<?php echo  $contatto["id"] ?>" class="btn btn-success" title="Visualizza"><i class="fas fa-eye"></i></a>
                        <a href="form-contatto.php?id=<?php echo  $contatto["id"] ?>" class="btn btn-info" title="Modifica"><i class="fas fa-pen"></i></a>
                        <a href="#" class="btn btn-danger" title="Cancella"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>



            </tbody>
        </table>
        <?php } else { ?>
            <div class="alert alert-info">Nessun record inserito</div>
        <?php } ?>

        <p class="mt-5"><a href="form-contatto.php" class="btn btn-primary"><i class="fas fa-plus"></i> Aggiungi contatto</a></p>
    </div>
</div>
<?php include "includes/footer.php"; ?>