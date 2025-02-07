<?php if (!defined('ABSPATH')) exit;

$context = Timber::context();
$context['image'] = get_template_directory_uri() . "/dist/images/img-404.svg";
$context['title'] = __("404 - Pagina non trovata", 'pdtheme');
$context['text'] = __("Sei sicuro quello che stai cercando si trova su questo sito?", 'pdtheme');
$context['button_text'] = __("Torna alla home", 'pdtheme');
$context['home_url'] =  esc_attr(home_url());

Timber::render('404.twig', $context);
