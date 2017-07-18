<?php
    $postURL = urlencode(get_permalink());
    $postTitle = str_replace( ' ', '%20', get_the_title());

    $twitterURL = 'https://twitter.com/intent/tweet?text='.$postTitle.'&amp;url='.$postURL.'&amp;via=Crunchify';
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$postURL;
    //$googleURL = 'https://plus.google.com/share?url='.$postURL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$postURL.'&amp;title='.$postTitle;

    $facebook = '<a class="facebook" href="'.$facebookURL.'" target="_blank"></a>';
    $google = '<a class="google" href="'.$googleURL.'" target="_blank"></a>';
    $twitter = '<a class="twitter" href="'. $twitterURL .'" target="_blank"></a>';
    $linkedin = '<a class="linkedin" href="'.$linkedInURL.'" target="_blank"></a>';
    $email = '<a class="email" href="" target="_blank"></a>';
    $bookmark = '<a class="bookmark" href="" target="_blank"></a>';

    echo $facebook;
    //echo $google;
    echo $twitter;
    echo $linkedin;
    echo $email;
    echo $bookmark;
?>