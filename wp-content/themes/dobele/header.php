<html xmlns="http://www.w3.org/1999/xhtml" lang="lv" xml:lang="lv">
<head>
    <title>Dobele</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>

<div class="container">
     <header>
        <div class="section-content">
            <nav class="navbar navbar-expand-lg navbar-light bg-faded">
                <div class="row">
                    <div class="col-lg-3 mobile-nav-bar">
                        <a class="navbar-brand" href="#">
                            <?php
                            if ( function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();
                            }
                            ?>
                        </a>
                        <div class="menu-button">
                            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                        
                    </div>
                    <div class="col-lg-9 menu-items">
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="nav-container">
                                 <?php wp_nav_menu(
                                    array(
                                        'theme_location' => 'top-header-menu',
                                        'menu'            => '',
                                        'container'       => 'div',
                                        'container_class' => 'navbar-nav top-nav',
                                        'container_id'    => '',
                                        'menu_class'      => '',
                                        'menu_id'         => '',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'items_wrap'      => '<ul id=\"%1$s\" class="navbar-nav">%3$s</ul>',
                                        'depth'           => 0,
                                    )
                                ); ?>
                                
                                <?php wp_nav_menu(
                                    array(
                                        'theme_location' => 'main-header-menu',
                                        'menu'            => '',
                                        'container'       => 'div',
                                        'container_class' => 'main-nav',
                                        'container_id'    => '',
                                        'menu_class'      => '',
                                        'menu_id'         => '',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'items_wrap'      => '<ul id=\"%1$s\" class="navbar-nav">%3$s</ul>',
                                        'depth'           => 0,
                                    )
                                ); ?>
                                <div class="navbar-nav top-nav mobile-only">
                                    <a class="nav-item nav-link active" href="#">Iepirkumi</a>
                                    <a class="nav-item nav-link" href="#">Par PIAUC</a>
                                    <a class="nav-item nav-link" href="#">Kontakti</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>       
            </nav>
        </div>
    </header>