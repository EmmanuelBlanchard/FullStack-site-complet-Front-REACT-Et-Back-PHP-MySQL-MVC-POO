<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>back/animaux/modificationValidation" enctype="multipart/form-data">
    <input type="hidden" name="animal_id" value="<?= $animal['animal_id']; ?>" />
    <div class="mb-3">
        <label for="animal_nom" class="form-label">Nom de l'animal : </label>
        <input type="text" class="form-control" id="animal_nom" name="animal_nom" value="<?= $animal['animal_nom'] ?>">
    </div>
    <div class="mb-3">
        <label for="animal_description" class="form-label">Description</label>
        <textarea class="form-control" id="animal_description" name="animal_description" rows="3"><?= $animal['animal_description'] ?></textarea>
    </div>
    <div class="mb-3">
        <div class='row no-gutters'>
            <div class="col-12">
                <img src="<?= URL ?>public/images/<?= $animal['animal_image'] ?>" class="img-thumbnail my-2" />
            </div>
            <div class="col-12">
                <label for="image" class="form-label">Image : </label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="famille_id" class="form-label">Familles : </label>
        <select class="form-select" aria-label="Selecteur de famille" name="famille_id">
            <option></option>
            <?php foreach ($families as $family) : ?>
                <option value="<?= $family['famille_id'] ?>"
                    <?php if($family['famille_id'] === $animal['famille_id']) echo "selected"; ?> 
                    >
                    <?= $family['famille_id'] ?> - <?= $family['famille_libelle'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        </select>
    </div>
    <div class='row no-gutters'>
        <div class="col-1"></div>
        <?php foreach($continents as $continent) : ?>
            <div class="mb-3 form-check col-2">
                <input type="checkbox" class="form-check-input" name="continent-<?= $continent['continent_id'] ?>"
                    <?php if(in_array($continent['continent_id'],$tabContinents))  echo "checked"; ?> 
                    >
                <label class="form-check-label" for="exampleCheck1"><?= $continent['continent_libelle'] ?></label>
            </div>
        <?php endforeach; ?>
        <div class="col-1"></div>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<?php 
$content = ob_get_clean();
$title = "Page de modification de l'animal : ". $animal['animal_nom'];
require "views/commons/template.php";
