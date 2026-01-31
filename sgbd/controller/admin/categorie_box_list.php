<label for="categorie_id">Catégorie</label>
<select class="form-control" id="categorie_id" name="categorie_id" required>
    <option value="">Sélectionnez une catégorie</option>
    <?php
    include_once __DIR__ . '/../../dto/categoriedto.php';
    include_once __DIR__ . '/../../model/categorie.php';
    $categorieDTO = new CategorieDTO();
    $categories = $categorieDTO->readAll();
    foreach ($categories as $categorie) {
        echo "<option value='{$categorie->getId()}'>{$categorie->getLabelle()}</option>";
    }
    ?>
</select>