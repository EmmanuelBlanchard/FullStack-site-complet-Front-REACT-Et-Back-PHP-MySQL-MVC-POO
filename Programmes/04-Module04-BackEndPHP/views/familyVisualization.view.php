<?php ob_start(); ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Famille</th>
            <th scope="col">Description</th>
            <th scope="col" colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($families as $family) : ?>
            <?php if(empty($_POST['famille_id']) || $_POST['famille_id'] !== $family['famille_id']) : ?>
                <tr>
                    <td><?= $family['famille_id'] ?></td>
                    <td><?= $family['famille_libelle'] ?></td>
                    <td><?= $family['famille_description'] ?></td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="famille_id" value="<?= $family['famille_id'] ?>" />
                            <button class="btn btn-warning" type="submit">Modifier</button>
                        </form>
                    <td>
                        <form method="POST" action="<?= URL ?>back/familles/validationSuppression" onSubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                            <input type="hidden" name="famille_id" value="<?= $family['famille_id'] ?>" />
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php else: ?>
                <form method="POST" action="<?= URL ?>back/familles/validationModification">
                    <tr>
                        <td><?= $family['famille_id'] ?></td>
                        <td><input type="text" name="famille_libelle" class="form-control" value="<?= $family['famille_libelle'] ?>" /></td>
                        <td><textarea name='famille_description' class="form-control" rows="3"><?= $family['famille_description'] ?></textarea></td>
                        <td colspan="2">
                            <input type="hidden" name="famille_id" value="<?= $family['famille_id'] ?>" />
                            <button class="btn btn-primary" type="submit">Valider</button>
                        </td>
                    </tr>
                </form>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 
$content = ob_get_clean();
$title = "Les familles";
require "views/commons/template.php";
