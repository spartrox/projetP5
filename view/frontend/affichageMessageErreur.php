<?php $title = 'Erreur'; ?>
<?php $script=""; ?>

<?php ob_start(); ?>

<div class="container" id="message_erreur">
	<p class="alert alert-danger" ><strong><?= 'Erreur : ' . $e->getMessage() ?> <a href="index.php">Retour à la page d'accueil</a></strong></p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>