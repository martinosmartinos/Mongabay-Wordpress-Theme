<?php
$blogid = get_current_blog_id();
if ($blogid == 20) {
    //News Mongabay
    mongabay_series_section (array('endangered-environmentalists','global-forest-reporting-network','indonesian-coal','southeast-asian-infrastructure','amazon-infrastructure','asian-rhinos','indonesian-fisheries','global-environmental-impacts-of-u-s-policy'), 3);
}
if ($blogid == 25) {
    //Mongabay Spanish
    mongabay_series_section (array('infraestructura-del-amazonas','conservacion-en-evolucion','oceanos','bosques-mundiales','red-global-de-reportajes-sobre-los-bosques','ecologistas-amenazados','comercio-de-especies-silvestre-en-america-latina'), 3);
}
?>