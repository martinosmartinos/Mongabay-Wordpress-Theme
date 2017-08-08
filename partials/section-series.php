<?php
$blogid = get_current_blog_id();
if ($blogid == 20 || $blogid == 1) {
    //News Mongabay
    mongabay_series_section (array('endangered-environmentalists','global-forest-reporting-network','almost-famous-animals','latin-american-wildlife-trade','amazon-infrastructure','great-apes','indonesian-fisheries','para-penjaga-hutan'), 3);
}
if ($blogid == 25) {
    //Mongabay Spanish
    mongabay_series_section (array('infraestructura-del-amazonas','conservacion-en-evolucion','oceanos','bosques-mundiales','red-global-de-reportajes-sobre-los-bosques','ecologistas-amenazados','comercio-de-especies-silvestre-en-america-latina'), 3);
}
?>