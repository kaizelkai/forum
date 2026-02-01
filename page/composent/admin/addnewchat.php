<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/index.php?for=addnewchat_submission" method="POST">
                            <h2 class="card-header">Ajouter un Nouveau Chat</h2>
                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="content">
                                    Contenu (<span id="charCount">0</span>/255)
                                </label>
                                <textarea class="form-control" id="content" name="content" rows="5" maxlength="255" required></textarea>
                            </div>
                            <div class="form-group">
                                <?php
                                    include 'sgbd/controller/admin/categorie_box_list.php';
                                ?>
                            </div> 
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

