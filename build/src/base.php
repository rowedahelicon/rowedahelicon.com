<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{website_title}</title>
        {website_css}
        <link rel="icon" type="image/x-icon" href="{website_url}images/favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="{website_url}images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="{website_url}images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="{website_url}images/favicon-16x16.png">
        <link rel="manifest" href="{website_url}site.webmanifest">
        <meta charset="UTF-8">
        <meta property="og:title" content="{website_title}">
        <meta property="og:description" content="{website_description}">
        <meta property="og:site_name" content="{website_title}">
        <meta property="og:type" content="profile">
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:site" content="@rowedahelicon">
        <meta property="twitter:image" content="{website_url}images/rowdy_og.png">
        <meta property="og:image" content="{website_url}images/rowdy_og.png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:url" content="{website_url}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    </head>
    <body>
        <div id="stars_1"></div>
        <div id="stars_2"></div>
        <div id="stars_3"></div>
        <div id="container" class="container md:mx-auto max-w-screen-lg md:mt-4 md:mb-1 stripes-1 p-2 border-solid border-0 md:border-8 border-black/70">
            {?header.php}
            {website_content}
            {?footer.php}
        </div>
        <div role="contentinfo">
            <p class="text-center text-gray-300 text-xs mb-4">
                Made with &lt;3 by <a href="https://rowdythecrux.dev" target="_blank">Rowedahelicon</a> :: Crucis Nexus 227 - <a href="{website_url}revision.html">Revision: 004</a>
            </p>
        </div>
    </body>
</html>