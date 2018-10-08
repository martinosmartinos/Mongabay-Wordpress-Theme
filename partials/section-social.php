<?php
    $site_id = get_current_blog_id();
    $twitter_account = '';
    switch ($site_id) {
        case '25':
            $twitter_account = 'mongabaylatam';
            break;
        case '26':
            $twitter_account = 'mongabay_fr';
            break;
        case '28':
            $twitter_account = 'mongabay_japan';
            break;
        case '29':
            $twitter_account = 'mongabay_brasil';
            break;
        case '30':
            $twitter_account = 'mongabayindia';
            break;
        default:
            $twitter_account = 'Mongabay';
            break;
    };
    $postURL = urlencode(get_permalink());
    $postTitle = str_replace( ' ', '%20', get_the_title());
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$postTitle.'&amp;url='.$postURL.'&amp;via='.$twitter_account;
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$postURL;
    //$googleURL = 'https://plus.google.com/share?url='.$postURL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$postURL.'&amp;title='.$postTitle;
    $whatsappURL = 'whatsapp://send?text='.$postURL.'&amp;title='.$postTitle;
    $facebook = '<a class="facebook" href="'.$facebookURL.'" target="_blank"></a>';
    $google = '<a class="google" href="'.$googleURL.'" target="_blank"></a>';
    $twitter = '<a class="twitter" href="'. $twitterURL .'" target="_blank"></a>';
    $linkedin = '<a class="linkedin" href="'.$linkedInURL.'" target="_blank"></a>';
    $whatsapp = '<a class="whatsapp" href="'.$whatsappURL.'" target="_blank"></a>';
    $email = '<a class="email" href="javascript:emailArticle()"></a>';
    $bookmark = '<a class="bookmark" id="bookmark" href="#" title="'.$postTitle.'" rel="sidebar"></a>';
    echo $facebook;
    //echo $google;
    echo $twitter;
    echo $linkedin;
    echo $whatsapp;
    echo $email;
    echo $bookmark;
    echo '<script>';?>
        jQuery(function() {
          jQuery('#bookmark').click(function() {
            if (window.sidebar && window.sidebar.addPanel) { // Mozilla Firefox Bookmark
              window.sidebar.addPanel(document.title, window.location.href, '');
            } else if (window.external && ('AddFavorite' in window.external)) { // IE Favorite
              window.external.AddFavorite(location.href, document.title);
            } else if (window.opera && window.print) { // Opera Hotlist
              this.title = document.title;
              return true;
            } else { // webkit - safari/chrome
              alert('Press ' + (navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL') + ' + D to bookmark this page.');
            }
          });
        });

        function emailArticle(){
            window.location.href="mailto:?subject="+document.title+"&body="+escape(window.location.href);
        }

    <?php
    echo '</script>';
?>
