<?php
//We can maybe move this to a central place
require ('/var/www/thestoa.blog/vendor/autoload.php');
use League\CommonMark\CommonMarkConverter;

$markdown = null;
if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/')
{
    if (file_exists('/var/www/rowedahelicon.com/public_html/library'.$_SERVER['REQUEST_URI'].'.md'))
    {
        $markdown = '/var/www/rowedahelicon.com/public_html/library'.$_SERVER['REQUEST_URI'].'.md';
    }
    else
    {
        header('HTTP/1.0 404 Not Found');
    }
}

if (!is_null($markdown) && file_exists(getcwd().$_SERVER['REQUEST_URI'].'.json')) $header = array_merge($header, json_decode(file_get_contents(getcwd().$_SERVER['REQUEST_URI'].'.json'), TRUE)); 
?>

<main class="p-4 overflow-auto">
    <div class="space-y-5">
        <?php  if (!is_null($markdown)): ?>
            <article>
                <?php $converter = new CommonMarkConverter(); echo $converter->convertToHtml(file_get_contents($markdown)); ?>
            </article>
        <?php else: ?>
            <h2 class="header-2 text-4xl aero text-center">Diary</h2>
        <?php endif; ?>
    </div>
</main>