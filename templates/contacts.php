<?php if (!defined('ABSPATH')) exit;
/**
 * Template Name: Contatti
 */
?>
<?php get_header(); ?>

<!--
TEMPLATES PER BACKEND CF7

Modulo:
<div class="row">
<div class="col-md-6">[text* nome placeholder "Nome*"]</div>
<div class="col-md-6">[text* cognome placeholder "Cognome*"]</div>
<div class="col-md-6">[text* telefono placeholder "Telefono*"]</div>
<div class="col-md-6">[email* email placeholder "E-mail*"]</div>
<div class="col-md-12"><div class="wrap-select">[select* posizione first_as_label "Analista/Sviluppatore MES" "Tecnico Automazione Industriale/Trasfertista" "Tecnico Sistemista" "Sviluppatore Software"]</div></div>
<div class="col-md-12">[textarea messaggio placeholder "Messaggio"]</div>
<div class="col-md-12 wrap-file-input">[file* file-686 id:form-file limit:10mb filetypes:pdf|jpg|jpeg|png]<label for="form-file"><span class="button">Allega CV</span><span class="text">Nessun file scelto</span></label></div>
<div class="col-md-6">
<div class="legenda">* I campi contrassegnati da asterisco sono obbligatori</div>
<div class="wrap-acceptance">
[acceptance acceptance-798]Ho letto l’informativa <a href="PROVACY_POLICY_HERE">Privacy</a>.[/acceptance]
[acceptance acceptance-799]Consento al trattamento dei dati per finalità di <a href="COOKIE_POLICY_HERE">marketing</a>[/acceptance]
</div>
</div>
<div class="col-md-6 wrap-submit">[submit class:button class:outline "Invia"]</div>
</div>


Mail:
<h1>Nuova richiesta di contatto</h1>

<strong>Nome:</strong> [nome]
<strong>Cognome:</strong> [cognome]
<strong>Telefono:</strong> [telefono]
<strong>Email:</strong> [email]
<strong>Posizione:</strong> [posizione]

<strong>Messaggio:</strong>
[messaggio]

--
Questa e-mail è stata inviata da un modulo di contatto su [_site_title] ([_site_url])
-->

<div class="container">
    <h1><?php the_title(); ?></h1>

    <?php if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <div class="wrap-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
