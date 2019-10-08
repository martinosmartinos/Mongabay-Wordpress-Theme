<?php
    function mongabay_menu_items() {

        //set up the list of names for menu items
        $items_en = array('Rainforests','Oceans','Animals & Environment','For Kids','Photography','WildTech','More');
        $items_es = array('BOSQUES','OCÉANOS','ANIMALES','CONSERVACIÓN','MEDIOAMBIENTE','OPORTUNIDADES','ORGANIZACIÓN');
        $items_de = array('Regenwälder','Meere','Tiere und Umwelt','Für Kinder','Fotografie','WildTech','Mehr');
        $items_cn = array('雨林','海洋','动物和环境','少儿版块','摄影','WildTech','更多');
        $items_jp = array('熱帯雨林','海洋','動物・環境','キッズ向け','写真','WildTech','その他');
        $items_it = array('Foreste Pluviali','Oceani','Animali & Ambiente','Per i bambini','WildTech','Altro');
        $items_brasil = array('Florestas Tropicais','Oceanos','Animais e Meio Ambiente','Para Crianças','WildTech','Mais');
        $items_fr = array('Forêts équatoriales','Océans','Animaux et environnement','Pour les enfants','Photographie','WildTech','Plus');
        $items_www = $items_en;
        $items_news = $items_en;
        $items_india = array('Forests','Animals','Oceans','People','Rivers','Opportunities','Mongabay Global','WildTech','About');
        $items_wildtech = array('Mobile','Conservation Drones','Monitoring','Satellite imagery','Tracking','Human-wildlife Conflict','More');
        $items_kidsnews = array('Kindergarten','Grade 1','Grade 2','Grade 3');

        //set up arrays for menu item's links
        $url_base = esc_url( home_url( '/', 'http' ) );

        $urls_kidsnews = array('https://kids.mongabay.com/kindergarten-books/','https://kids.mongabay.com/1st-grade-books/',$url_base.'series/grade-3/',$url_base.'series/grade-3/');

        $urls_en = array('https://news.mongabay.com/list/rainforests','https://news.mongabay.com/list/oceans','https://news.mongabay.com/list/environment','http://kidsnews.mongabay.com/','https://travel.mongabay.com/','https://wildtech.mongabay.com/','https://www.mongabay.com/about/',$url_base);

        $urls_es = array($url_base.'list/bosques',$url_base.'list/oceanos',$url_base.'list/animales',$url_base.'list/conservacion',$url_base.'medioambiente/',$url_base.'oportunidades/',$url_base.'acerca-de-mongabay/',$url_base);

        $urls_de = array($url_base.'list/regenwalder',$url_base.'list/meere',$url_base.'list/umwelt','http://global.mongabay.com/de/','https://travel.mongabay.com/','https://wildtech.mongabay.com/',$url_base);

        $urls_cn = array($url_base.'list/雨林',$url_base.'list/海洋',$url_base.'list/动物和环境','https://global.mongabay.com/cn/kids/rainforests','https://travel.mongabay.com/','https://wildtech.mongabay.com/',$url_base);

        $urls_jp = array($url_base.'list/熱帯雨林',$url_base.'list/海洋',$url_base.'list/環境','http://global.mongabay.com/jp/','https://travel.mongabay.com/','https://wildtech.mongabay.com/',$url_base);

        $urls_it = array($url_base.'list/rainforests',$url_base.'list/oceani',$url_base.'list/ambiente','http://global.mongabay.com/it/','https://wildtech.mongabay.com/',$url_base);

        $urls_india = array($url_base.'list/forests',$url_base.'list/animals', $url_base.'list/oceans',$url_base.'list/people',$url_base.'list/rivers','https://www.mongabay.org/programs/news/opportunities/','https://news.mongabay.com/','https://wildtech.mongabay.com/',$url_base.'about/',$url_base);

        $urls_brasil = array($url_base.'list/florestas-tropicais',$url_base.'list/oceanos',$url_base.'list/ambiente','http://global.mongabay.com/pt/','https://wildtech.mongabay.com/',$url_base);

        $urls_fr = array($url_base.'list/forets-equatoriales',$url_base.'list/oceans',$url_base.'list/environnement','http://global.mongabay.com/fr/','https://travel.mongabay.com/','https://wildtech.mongabay.com/',$url_base);

        $urls_www = $urls_en;
        $urls_news = $urls_en;
        $urls_wildtech = array('https://news.mongabay.com/list/mobile','https://news.mongabay.com/list/conservation-drones','https://news.mongabay.com/list/monitoring','http://news.mongabay.com/list/satellite-imagery','http://news.mongabay.com/list/tracking','https://news.mongabay.com/list/human-wildlife-conflict','https://news.mongabay.com/about-wildtech/',$url_base);

        //get current site host name
        $site = mongabay_subdomain_name();


        //return unordered list with menu items
        foreach (${"items_".$site} as $item) {
            $count = $count + 1;
            $item_url = ${"urls_".$site}[($count -1)];
            //var_dump($item_url);
            echo '<li class="nav-item '.$count.'">';
            echo '<a href="'.$item_url.'" class="nav-link">';
            echo $item;
            echo '</a>';
            echo '</li>';
        }
    }
?>
