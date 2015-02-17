<?php
//session_start();
function getit($url)
{
    $doc = new DOMDocument;libxml_use_internal_errors(true);
    $doc->loadhtmlfile($url);libxml_use_internal_errors(false);

    $element = $doc->getElementById('site-header');
    $element->parentNode->removeChild($element);
    $html = $doc->saveHTML();

    $element = $doc->getElementById('sidebar');
    $element->parentNode->removeChild($element);
    $html = $doc->saveHTML();

    $element = $doc->getElementById('footer');
    $element->parentNode->removeChild($element);
    $html = $doc->saveHTML();

    $element = $doc->getElementById('sub-footer');
    $element->parentNode->removeChild($element);
    $html = $doc->saveHTML();
    
    $element = $doc->getElementById('nav-below');
    $element->parentNode->removeChild($element);
    $html = $doc->saveHTML();
    
    $html = preg_replace('#<header class="entry-header entry-meta">(.*?)</header>#', '', $html);
    
    $html = str_replace("www.pragyan.org/blog/20","localhost/blog-game/fb-login/game_master.php?q=20",$html);
        
    return $html;
}

?>