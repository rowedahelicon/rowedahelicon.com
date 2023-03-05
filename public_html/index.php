<?php
    include("../private/config.php");
    include( $GLOBALS['config']['private_folder'].'/backend/_config.php' );
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
        <title><?php echo $GLOBALS['config']['title']; ?></title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="assets/css/main.min.css">
        <link rel="stylesheet" href="assets/css/tailwind.min.css">
        <link href="assets/fontawesome/fontawesome.min.css" rel="stylesheet">
        <link href="assets/fontawesome/brands.min.css" rel="stylesheet">
        <link href="assets/fontawesome/solid.min.css" rel="stylesheet">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#00A1D1">
    </head>
    <body>
        <div id="stars_1"></div>
        <div id="stars_2"></div>
        <div id="stars_3"></div>
        <?php include( $GLOBALS['config']['private_folder'].'/frontend/global/nav_top.php' ); ?>
        <div id="container" class="container md:mx-auto max-w-screen-lg md:mt-1 rounded-lg stripes-1 p-2 border-solid border-0 md:border-8 border-black/70">
            <Header class="p-2">
                <div class="h-10" style="background-color: #394551;"></div>
                <div class="flex-auto aero text-white text-8xl leading-none text-center mt-5 mb-0">
                    Rowedahelicon
                </div>
                <?php if( count( $GLOBALS['nav'] ) > 0 ): ?>
                    <ol class="list-reset flex p-3 text-normal text-gray-200 font-semibold">
                        <li><a href="/">Home</a></li>
                        <?php foreach( $GLOBALS['nav'] as $key => $value ): ?>
                            <li><span class="mx-2">/</span></li>
                            <?php echo (array_key_last( $GLOBALS['nav'] ) == $key ) ? '<li>'.$key.'</li>' : '<li><a href="'.$value.'">'.$key.'</a></li>'; ?>
                        <?php endforeach; ?>
                    </ol>
                    <?php endif; ?>
                <div class="h-12 stripes-2"></div>
            </Header>
            <main class="p-2">
                <?php include( $GLOBALS['config']['private_folder'].'/frontend/_config.php' );?>
            </main>
            <footer>
                <?php include( $GLOBALS['config']['private_folder'].'/frontend/global/footer.php' );?>
            </footer>
        </div>
    </body>
</html> 