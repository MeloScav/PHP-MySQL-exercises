<!-- FORM -->
<div class="container-form-background">
    <div class="container">
        <h2>Écrire un commentaire :</h2>
        <form id="formulaire" class="comment-form" action="comments_post.php?news=<?php echo $id_news ?>" method="post">
            <div class="form-input">
                <label for="name">Nom :</label>
                <label for="message">Message :</label>
            </div>
            <div class="form-input">
                <input type="text" name="name" id="name" required>
                <textarea name="message" id="message" cols="30" rows="5" required></textarea>
            </div>
        </form>
        <div class="buttons">
            <input class="btn-form" type="submit" form="formulaire" value="Envoyer">
            <button class="btn-form reload-button" type="button">Actualiser</button>
        </div>
    </div>
</div>