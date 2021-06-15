<!DOCTYPE html><?php $obj = json_decode(file_get_contents(FCPATH."data/".$language."_app.json"));?>
<html lang="zxx" class="js">
<head>
	<meta charset="utf-8">
<meta name="author" content="Smart <?php echo $obj->main->a_1; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<?php echo $obj->description; ?>">
<meta name="keyword" content="<?php echo $obj->keyword; ?>">
<base href="<?php echo base_url();?>">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="<?php echo $obj->twitter; ?>">
<meta name="twitter:creator" content="<?php echo $obj->twitter; ?>">
<meta name="twitter:title" content="<?php echo $obj->title; ?>">
<meta name="twitter:description" content="<?php echo $obj->description; ?>">
<meta name="twitter:image" content="<?php echo $obj->banner; ?>">
<!-- Facebook -->
<meta property="og:url" content="<?php echo base_url(); ?>">
<meta property="og:title" content="<?php echo $obj->title; ?>">
<meta property="og:description" content="<?php echo $obj->description; ?>">
<meta property="og:type" content="article">
<meta property="og:image" content="<?php echo $obj->banner; ?>">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1000">
<meta property="og:image:height" content="500">


<!-- Fav Icon  -->
<link rel="shortcut icon" href="images/favicon.png">
<!-- Site Title  -->
<title><?php echo $obj->title; ?></title>
<!-- Bundle and Base CSS -->
<link rel="stylesheet" href="templates/styles/css/vendor.bundle.css?ver=1930">
<link rel="stylesheet" href="templates/styles/css/style-dark.css?ver=1930" id="changeTheme">
<!-- Extra CSS -->
<link rel="stylesheet" href="templates/styles/css/theme.css?ver=1930">




</head>


    <body class="nk-body body-wider theme-light mode-onepage">

	<div class="nk-wrap">
		<header class="nk-header page-header is-transparent is-sticky is-shrink is-light" id="header">
		    <!-- Header @s -->
            <div class="header-main">
                <div class="header-container container">
                    <div class="header-wrap">
                        <!-- Logo @s -->
                        <div class="header-logo logo animated" data-animate="fadeInDown" data-delay=".65">
                            <a href="./" class="logo-link">
                                <img class="logo-dark" src="templates/styles/templates/styles/images/logo.png" srcset="images/logo2x.png 2x" alt="logo">
                                <img class="logo-light" src="templates/styles/templates/styles/images/logo.png" srcset="images/logo2x.png 2x" alt="logo">
                            </a>
                        </div>

                        <!-- Menu Toogle @s -->
                        <div class="header-nav-toggle">
                            <a href="#" class="navbar-toggle" data-menu-toggle="example-menu-04">
                                <div class="toggle-line">
                                    <span></span>
                                </div>
                            </a>
                        </div>

                        <!-- Menu @s -->
                        <div class="header-navbar header-navbar-s1">
                            <nav class="header-menu" id="example-menu-04">
                                <ul class="menu menu-s2 animated" data-animate="fadeInDown" data-delay=".75">
                                    <li class="menu-item"><a class="menu-link nav-link" href="#ico"><?php echo $obj->header->menu_itema_0; ?></a></li>
                                    <li class="menu-item"><a class="menu-link nav-link" href="#token"><?php echo $obj->header->menu_itema_1; ?></a></li>
                                    <li class="menu-item"><a class="menu-link nav-link" href="#roadmap"><?php echo $obj->header->menu_itema_2; ?></a></li>
                                    <li class="menu-item"><a class="menu-link nav-link" href="#team"><?php echo $obj->header->menu_itema_3; ?></a></li>
                                    <li class="menu-item"><a class="menu-link nav-link" href="#partners"><?php echo $obj->header->menu_itema_4; ?></a></li>
                                    <li class="menu-item has-sub">
                                        <a class="menu-link nav-link menu-toggle" href="#"><?php echo $obj->header->menu_itemhas_suba_0; ?></a>
                                        <ul class="menu-sub menu-drop">
                                            <li class="menu-item"><a class="menu-link nav-link" href="#media-partner"><?php echo $obj->header->menu_itema_5; ?></a></li>
                                            <li class="menu-item"><a class="menu-link nav-link" href="#blog"><?php echo $obj->header->menu_itema_6; ?></a></li>
                                            <li class="menu-item"><a class="menu-link nav-link" href="#faqs"><?php echo $obj->header->menu_itema_7; ?></a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item"><a class="menu-link nav-link" href="#contact"><?php echo $obj->header->menu_itema_8; ?></a></li>
                                </ul>
                                <ul class="menu-btns animated" data-animate="fadeInDown" data-delay=".85">
                                    <li><a href="#" class="btn btn-rg btn-auto btn-outline btn-grad on-bg-light btn-round"><?php echo $obj->header->a_0; ?></a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#login-popup" class="btn btn-rg btn-auto btn-outline btn-grad on-bg-light btn-round"><?php echo $obj->header->a_1; ?></a></li>
                                </ul>
                            </nav>
                        </div><!-- .header-navbar @e -->
                    </div>                                                
                </div>
            </div><!-- .header-main @e -->
            <!-- Banner @s -->
            <div class="header-banner bg-light">
                <div class="nk-banner">
                    <div class="banner banner-mask-fix banner-fs banner-single">
                        <div class="banner-wrap ov-v">
                            <div class="container">
                                <div class="row align-items-center justify-content-center justify-content-lg-between gutter-vr-30px">
                                    <div class="col-lg-6">
                                        <div class="banner-caption wide-auto text-center text-lg-left">
                                            <div class="cpn-head mt-0">
                                                <h1 class="title title-xl-2 animated" data-animate="fadeInUp" data-delay="1.25"><?php echo $obj->header->cpn_headmt_0h1_0; ?></h1>
                                            </div>
                                            <div class="cpn-text cpn-text-s1">
                                                <p class="lead animated" data-animate="fadeInUp" data-delay="1.35"><?php echo $obj->header->cpn_textcpn_text_s1p_0; ?></p>
                                            </div>
                                            <div class="cpn-btns">
                                                <ul class="btn-grp animated" data-animate="fadeInUp" data-delay="1.45">
                                                    <li><a href="#" class="btn btn-md btn-grad btn-round"><?php echo $obj->header->a_2; ?></a></li>
                                                    <li><a href="#" class="btn btn-md btn-grad btn-grad-alternet btn-round"><?php echo $obj->header->a_3; ?></a></li>
                                                </ul>
                                            </div>
                                            <div class="cpn-social">
                                                <ul class="social">
                                                    <li class="animated" data-animate="fadeInUp" data-delay="1.5"><a href="#"><em class="social-icon fab fa-facebook-f"></em></a></li>
                                                    <li class="animated" data-animate="fadeInUp" data-delay="1.55"><a href="#"><em class="social-icon fab fa-twitter"></em></a></li>
                                                    <li class="animated" data-animate="fadeInUp" data-delay="1.6"><a href="#"><em class="social-icon fab fa-youtube"></em></a></li>
                                                    <li class="animated" data-animate="fadeInUp" data-delay="1.65"><a href="#"><em class="social-icon fab fa-github"></em></a></li>
                                                    <li class="animated" data-animate="fadeInUp" data-delay="1.7"><a href="#"><em class="social-icon fab fa-bitcoin"></em></a></li>
                                                    <li class="animated" data-animate="fadeInUp" data-delay="1.75"><a href="#"><em class="social-icon fab fa-medium-m"></em></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-lg-5 col-sm-9">
                                        <div class="token-status token-status-s5 bg-transparent no-bd">
                                            <div class="nk-circle-pk animated" data-animate="fadeIn" data-delay="1.75">
                                                <div class="line-1"></div>
                                                <div class="line-2"></div>
                                                <div class="line-3"></div>
                                                <div class="line-4"></div>
                                            </div>
                                            <div class="token-box token-box-s3 animated" data-animate="fadeInUp" data-delay="1.85">
                                                <div class="countdown-s3 countdown-s4 countdown" data-date="2021/08/10"></div>
                                            </div>
                                            <div class="token-action animated" data-animate="fadeInUp" data-delay="1.85">
                                                <a class="btn btn-rg btn-grad btn-grad-alternet btn-round" href="#"><?php echo $obj->header->token_actionanimateda_0; ?></a>
                                            </div>
                                            <ul class="icon-list animated" data-animate="fadeInUp" data-delay="1.85">
                                                <li><em class="fab fa-bitcoin"></em></li>
                                                <li><em class="fas fa-won-sign"></em></li>
                                                <li><em class="fab fa-cc-visa"></em></li>
                                                <li><em class="fab fa-cc-mastercard"></em></li>
                                            </ul>
                                        </div>
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-banner -->
                <div class="nk-ovm mask-c-light shape-v mask-contain-bottom"></div>
                
                <!-- Place Particle Js -->
                <div id="particles-bg" class="particles-container particles-bg" data-pt-base="#00c0fa" data-pt-base-op=".3" data-pt-line="#2b56f5" data-pt-line-op=".5" data-pt-shape="#00c0fa" data-pt-shape-op=".2"></div>
            </div>
			<!-- .header-banner @e -->
		</header>
    
        <main class="nk-pages">
            <section class="section mask-c-blend-light bg-white ov-h" id="ico">
                <div class="container">
                    <!-- Block @s -->
                    <div class="nk-block nk-block-text-wrap">
                        <div class="row align-items-center justify-content-center justify-content-md-between gutter-vr-30px">
                            <div class="col-mb-9 col-sm-7 col-md-6 col-lg-5 order-md-last">
                                <div class="nk-block-img animated" data-animate="fadeInUp" data-delay=".1">
                                    <img src="templates/styles/images/gfx-z-a.png" alt="app">
                                </div>
                            </div>
                            <div class="col-sm-10 col-md-6 text-center text-md-left">
                                <div class="nk-block-text">
                                    <h2 class="title animated" data-animate="fadeInUp" data-delay=".2"><?php echo $obj->main->nk_block_texth2_0; ?></h2>
                                    <p class="lead animated" data-animate="fadeInUp" data-delay=".3"><?php echo $obj->main->nk_block_textp_0; ?></p>
                                    <a href="https://www.youtube.com/watch?v=SSo_EIwHSd4" class="video-popup btn-play-wrap animated" data-animate="fadeInUp" data-delay=".4">
                                        <div class="btn-play btn-play-sm btn-play-s2">
                                            <em class="btn-play-icon"></em>
                                        </div>
                                        <div class="btn-play-text">
                                            <span class="text-sm">Watch Video</span>
                                            <span class="text-xs">What and How it work</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div><!-- .row -->
                    </div><!-- .block @e -->
                </div>
            </section>
            <!-- // -->
            <section class="section bg-white py-0 ov-h">
                <div class="container">
                    <!-- Block @s -->
                    <div class="nk-block nk-block-features-2">
                        <div class="row align-items-center gutter-vr-30px justify-content-center justify-content-md-between">
                            <div class="col-mb-9 col-sm-7 col-md-6 col-lg-5">
                                <div class="gfx py-4 animated" data-animate="fadeInUp" data-delay=".1">
                                    <img src="templates/styles/images/gfx-z-b.png" alt="gfx">
                                </div>
                            </div><!-- .col -->
                            <div class="col-sm-10 col-md-6 text-center text-md-left">
                                <!-- Section Head @s -->
                                <div class="nk-block-text">
                                    <h4 class="title title-lg animated" data-animate="fadeInUp" data-delay=".2"><?php echo $obj->main->nk_block_texth4_0; ?></h4>
                                    <p class="lead animated" data-animate="fadeInUp" data-delay=".3"><?php echo $obj->main->nk_block_textp_1; ?></p>
                                    <p class="animated" data-animate="fadeInUp" data-delay=".4"><?php echo $obj->main->nk_block_textp_2; ?></p>
                                    <p class="animated" data-animate="fadeInUp" data-delay=".5"><?php echo $obj->main->nk_block_textp_3; ?></p>
                                </div>
                            </div>
                        </div><!-- .row -->
                    </div><!-- .block @e -->
                </div>
            </section>
            <!-- // -->
            <section class="section bg-white bg-blend-light-alt">
                <div class="container">
                    <div class="section-head text-center wide-auto-sm">
                        <div class="section-head-line">
							<span class="line-1"></span><span class="line-2"></span><span class="line-3"></span><span class="line-4"></span>
							<span class="line-5"></span><span class="line-6"></span><span class="line-7"></span><span class="line-8"></span>
						</div>
                        <h2 class="title title-s4 animated" data-animate="fadeInUp" data-delay=".1" title="APPS"><?php echo $obj->main->headtext_centerwide_auto_smh2_0; ?></h2>
                        <p class="animated" data-animate="fadeInUp" data-delay=".2"><?php echo $obj->main->headtext_centerwide_auto_smp_0; ?></p>
                    </div>
                    <!-- Block @s -->
                    <div class="nk-block nk-block-text-wrap">
                        <div class="row align-items-center justify-content-center justify-content-md-between gutter-vr-30px">
                            <div class="col-mb-9 col-sm-7 col-md-6">
                                <div class="nk-block-img animated" data-animate="fadeInUp" data-delay=".3">
                                    <img src="templates/styles/images/gfx-z-c.png" alt="app">
                                </div>
                            </div>
                            <div class="col-sm-10 col-md-6 col-lg-5">
                                <div class="nk-block-text ml-lg-3 ml-xl-0">
                                    <p class="animated" data-animate="fadeInUp" data-delay=".4"><?php echo $obj->main->nk_block_textml_lg_3ml_xl_0p_0; ?></p>
                                    <ul class="list list-dot pdb-r">
                                        <li class="animated" data-animate="fadeInUp" data-delay=".5"><?php echo $obj->main->listlist_dotpdb_rli_0; ?></li>
                                        <li class="animated" data-animate="fadeInUp" data-delay=".55"><?php echo $obj->main->listlist_dotpdb_rli_1; ?></li>
                                        <li class="animated" data-animate="fadeInUp" data-delay=".65"><?php echo $obj->main->listlist_dotpdb_rli_2; ?></li>
                                        <li class="animated" data-animate="fadeInUp" data-delay=".7"><?php echo $obj->main->listlist_dotpdb_rli_3; ?></li>
                                        <li class="animated" data-animate="fadeInUp" data-delay=".75"><?php echo $obj->main->listlist_dotpdb_rli_4; ?></li>
                                    </ul>
                                    <ul class="btn-grp justify-content-center justify-content-md-start">
                                        <li class="animated" data-animate="fadeInUp" data-delay=".85"><a href="#" class="btn btn-grad btn-round btn-md"><?php echo $obj->main->animateda_0; ?></a></li>
                                        <li class="animated" data-animate="fadeInUp" data-delay=".95">
                                            <ul class="btn-grp gutter-15px">
                                                <li><a href="#"><em class="fab fa-apple"></em></a></li>
                                                <li><a href="#"><em class="fab fa-android"></em></a></li>
                                                <li><a href="#"><em class="fab fa-windows"></em></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .row -->
                    </div><!-- .block @e -->
                </div>
            </section>
            <!-- // -->
            <section class="section section-tokensale bg-white" id="token">
                <!-- Block @s -->
                <div class="container">
                    <div class="section-head text-center wide-auto-sm">
                        <h2 class="title title-s4 animated" data-animate="fadeInUp" data-delay=".1" title="TOKEN"><?php echo $obj->header->menu_itema_1; ?></h2>
                        <p class="animated" data-animate="fadeInUp" data-delay=".2"><?php echo $obj->main->headtext_centerwide_auto_smp_0; ?></p>
                    </div>
                    <div class="nk-block nk-block-token mgb-m30">
                        <div class="row align-items-center justify-content-between gutter-vr-50px">
                            <div class="col-lg-6">
                                <div class="row gutter-vr-30px">
                                    <div class="col-sm-6">
                                        <div class="stage-info animated" data-animate="fadeInUp" data-delay=".3">
                                            <h6 class="title title-s6 title-xs-s2"><?php echo $obj->main->stage_infoanimatedh6_0; ?></h6>
                                            <p><?php echo $obj->main->stage_infoanimatedp_0; ?></p>
                                        </div>
                                    </div><!-- .col  -->
                                    <div class="col-sm-6">
                                        <div class="stage-info animated" data-animate="fadeInUp" data-delay=".4">
                                            <h6 class="title title-s6 title-xs-s2"><?php echo $obj->main->stage_infoanimatedh6_1; ?></h6>
                                            <p><?php echo $obj->main->stage_infoanimatedp_1; ?></p>
                                        </div>
                                    </div><!-- .col  -->
                                    <div class="col-sm-6">
                                        <div class="stage-info animated" data-animate="fadeInUp" data-delay=".5">
                                            <h6 class="title title-s6 title-xs-s2"><?php echo $obj->main->stage_infoanimatedh6_2; ?></h6>
                                            <p><?php echo $obj->main->stage_infoanimatedp_2; ?></p>
                                        </div>
                                    </div><!-- .col  -->
                                    <div class="col-sm-6">
                                        <div class="stage-info animated" data-animate="fadeInUp" data-delay=".6">
                                            <h6 class="title title-s6 title-xs-s2"><?php echo $obj->main->stage_infoanimatedh6_3; ?></h6>
                                            <p><?php echo $obj->main->stage_infoanimatedp_3; ?></p>
                                        </div>
                                    </div><!-- .col  -->
                                    <div class="col-sm-6">
                                        <div class="stage-info animated" data-animate="fadeInUp" data-delay=".7">
                                            <h6 class="title title-s6 title-xs-s2"><?php echo $obj->main->stage_infoanimatedh6_4; ?></h6>
                                            <p><?php echo $obj->main->stage_infoanimatedp_4; ?></p>
                                        </div>
                                    </div><!-- .col  -->
                                    <div class="col-sm-6">
                                        <div class="stage-info animated" data-animate="fadeInUp" data-delay=".8">
                                            <h6 class="title title-s6 title-xs-s2"><?php echo $obj->main->stage_infoanimatedh6_5; ?></h6>
                                            <p><?php echo $obj->main->stage_infoanimatedp_5; ?></p>
                                        </div>
                                    </div><!-- .col  -->
                                </div><!-- .row  -->
                            </div>
                            <div class="col-lg-5">
                                <div class="token-status token-status-s5 bg-light round no-bd animated" data-animate="fadeInUp" data-delay=".9">
                                    <div class="token-box token-box-s3">
                                        <div class="countdown-s3 countdown-s4 countdown" data-date="2021/08/10"></div>
                                    </div>
                                    <div class="token-action">
                                        <a class="btn btn-md btn-round btn-grad btn-grad-alternet" href="#"><?php echo $obj->main->token_actiona_0; ?></a>
                                    </div>
                                    <ul class="icon-list">
                                        <li><em class="fab fa-bitcoin"></em></li>
                                        <li><em class="fas fa-won-sign"></em></li>
                                        <li><em class="fab fa-cc-visa"></em></li>
                                        <li><em class="fab fa-cc-mastercard"></em></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- .block @e -->
                    <div class="nk-block">
                        <div class="row justify-content-center gutter-vr-40px">
                            <div class="col-md-6 col-mb-8">
                                <div class="single-chart">
                                    <h3 class="mgb-l text-center title-lg animated" data-animate="fadeInUp" data-delay=".1"><?php echo $obj->main->single_charth3_0; ?></h3>
                                    <div class="chart animated" data-animate="fadeInUp" data-delay=".2">
                                        <img src="templates/styles/images/e-light.png" alt="chart">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-mb-8">
                                <div class="single-chart">
                                    <h3 class="mgb-l text-center title-lg animated" data-animate="fadeInUp" data-delay=".3"><?php echo $obj->main->single_charth3_1; ?></h3>
                                    <div class="chart animated" data-animate="fadeInUp" data-delay=".4">
                                       <img src="templates/styles/images/f-light.png" alt="chart">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .block @e -->
                </div>
            </section>
            <!-- // -->
            <section class="section bg-light section-connect" id="roadmap">
                <div class="container ov-h">
                    <div class="section-head text-center wide-auto-sm">
                        <h2 class="title title-s4 animated" data-animate="fadeInUp" data-delay=".1" title="<?php echo $obj->header->menu_itema_2; ?>">Our <?php echo $obj->header->menu_itema_2; ?></h2>
                    </div><!-- .section-head @e -->
                </div>
                    <!-- Block @s -->
                <div class="nk-block ov-h">
                    <div class="container">
                        <div class="roadmap-list animated" data-animate="fadeInUp" data-delay=".2">
                            <div class="roadmap-item roadmap-item-sm roadmap-done">
                                <div class="roadmap-innr">
                                    <h6 class="roadmap-title roadmap-title-s2"><?php echo $obj->main->roadmap_innrh6_0; ?></h6>
                                    <p><?php echo $obj->main->stage_infoanimatedh6_0; ?> of the Smart <?php echo $obj->main->a_1; ?> Platform Development.</p>
                                </div>
                            </div><!-- .roadmap-item -->
                            <div class="roadmap-item roadmap-done">
                                <div class="roadmap-innr">
                                    <h6 class="roadmap-title roadmap-title-s2"><?php echo $obj->main->roadmap_innrh6_1; ?></h6>
                                    <p><?php echo $obj->main->roadmap_innrp_1; ?></p>
                                </div>
                            </div>
                            <div class="roadmap-item roadmap-item-lg">
                                <div class="roadmap-innr">
                                    <h6 class="roadmap-title roadmap-title-s2"><?php echo $obj->main->roadmap_innrh6_1; ?></h6>
                                    <p><?php echo $obj->main->roadmap_innrp_2; ?></p>
                                </div>
                            </div>
                            <div class="roadmap-item">
                                <div class="roadmap-innr">
                                    <h6 class="roadmap-title roadmap-title-s2"><?php echo $obj->main->roadmap_innrh6_3; ?></h6>
                                    <p><?php echo $obj->main->roadmap_innrp_3; ?></p>
                                </div>
                            </div>
                            <div class="roadmap-item roadmap-item-sm">
                                <div class="roadmap-innr">
                                    <h6 class="roadmap-title roadmap-title-s2"><?php echo $obj->main->roadmap_innrh6_4; ?></h6>
                                    <p><?php echo $obj->main->stage_infoanimatedh6_0; ?> <?php echo $obj->header->menu_itema_1; ?> Round (1)</p>
                                </div>
                            </div>
                            <div class="roadmap-item">
                                <div class="roadmap-innr">
                                    <h6 class="roadmap-title roadmap-title-s2"><?php echo $obj->main->roadmap_innrh6_5; ?></h6>
                                    <p><?php echo $obj->header->menu_itema_4; ?>hip for the future EcoSystem</p>
                                </div>
                            </div>
                            <div class="roadmap-item roadmap-item-lg">
                                <div class="roadmap-innr">
                                    <h6 class="roadmap-title roadmap-title-s2"><?php echo $obj->main->roadmap_innrh6_6; ?></h6>
                                    <p><?php echo $obj->main->roadmap_innrp_6; ?></p>
                                </div>
                            </div>
                            <div class="roadmap-item">
                                <div class="roadmap-innr">
                                    <h6 class="roadmap-title roadmap-title-s2"><?php echo $obj->main->roadmap_innrh6_7; ?></h6>
                                    <p><?php echo $obj->main->roadmap_innrp_7; ?></p>
                                </div>
                            </div>
                            <div class="roadmap-item roadmap-item-sm">
                                <div class="roadmap-innr">
                                    <h6 class="roadmap-title roadmap-title-s2"><?php echo $obj->main->roadmap_innrh6_8; ?></h6>
                                    <p><?php echo $obj->main->stage_infoanimatedh6_0; ?> <?php echo $obj->header->menu_itema_1; ?> Round (2)</p>
                                </div>
                            </div>
                            <div class="roadmap-item">
                                <div class="roadmap-innr">
                                    <h6 class="roadmap-title roadmap-title-s2"><?php echo $obj->main->roadmap_innrh6_9; ?></h6>
                                    <p><?php echo $obj->main->roadmap_innrp_9; ?></p>
                                </div>
                            </div>
                            <div class="roadmap-item roadmap-item-lg">
                                <div class="roadmap-innr">
                                    <h6 class="roadmap-title roadmap-title-s2"><?php echo $obj->main->roadmap_innrh6_10; ?></h6>
                                    <p><?php echo $obj->main->roadmap_innrp_10; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .block @e -->
            </section>
            <!-- // -->
            <section class="section bg-white ov-h pb-0" id="team">
                <div class="container">
                    <div class="section-head text-center wide-auto-sm">
                        <h2 class="title title-s4 animated" data-animate="fadeInUp" data-delay=".1" title="team"><?php echo $obj->main->headtext_centerwide_auto_smh2_3; ?></h2>
                        <p class="animated" data-animate="fadeInUp" data-delay=".2"><?php echo $obj->main->headtext_centerwide_auto_smp_0; ?></p>
                    </div>
                    <!-- Block @s -->
                    <div class="nk-block nk-block-team-list team-list">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-sm-6">
                                <div class="team team-s5 animated" data-animate="fadeInUp" data-delay=".3">
                                    <div class="team-photo team-photo-s1">
                                        <img src="templates/styles/images/sq-a.jpg" alt="team" class="no-bdrs">
                                        <a href="#team-popup-1" class="team-show content-popup" data-overlay="bg-theme-grad-alternet"></a>
                                    </div>
                                    <h5 class="team-name title title-md"><?php echo $obj->main->teamteam_s5animatedh5_0; ?></h5>
                                    <span class="team-position">CEO &amp; Lead <?php echo $obj->main->a_1; ?></span>
                                    <ul class="team-social team-social-vr team-social-s2">
                                        <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                        <li><a href="#"><em class="fab fa-twitter"></em></a></li>
                                        <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                                    </ul>
                                </div>
                                <!-- <?php echo $obj->main->stage_infoanimatedh6_0; ?> .team-profile  -->
                                <div id="team-popup-1" class="team-popup mfp-hide">
                                    <a title="Close" class="mfp-close">×</a>
                                    <div class="row align-items-start">
                                        <div class="col-md-6">
                                            <div class="team-photo">
                                                <img src="templates/styles/images/a-color.jpg" alt="team">
                                            </div>
                                        </div><!-- .col  -->
                                        <div class="col-md-6">
                                            <div class="team-popup-info pl-md-3">
                                                <h3 class="team-name title title-lg pt-4"><?php echo $obj->main->team_popup_infopl_md_3h3_0; ?></h3>
                                                <p class="team-position mb-1"><?php echo $obj->main->team_popup_infopl_md_3p_0; ?></p>
                                                <ul class="team-social team-social-s2 mb-4">
                                                    <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                                    <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                                                </ul>
                                                <p><?php echo $obj->main->team_popup_infopl_md_3p_1; ?></p>
                                                <p><?php echo $obj->main->team_popup_infopl_md_3p_2; ?></p>
                                                <div class="progress-list">
                                                    <div class="progress-wrap">
                                                        <div class="progress-title"><?php echo $obj->main->a_1; ?> <span class="progress-amount">85%</span></div>
                                                        <div class="progress-bar progress-bar-xs bg-black-10">
                                                            <div class="progress-percent bg-theme-grad-alternet" data-percent="85"></div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-wrap">
                                                        <div class="progress-title">Decentralization <span class="progress-amount">68%</span></div>
                                                        <div class="progress-bar progress-bar-xs bg-black-10">
                                                            <div class="progress-percent bg-theme-grad-alternet" data-percent="68"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col  -->
                                    </div><!-- .row  -->
                                </div><!-- .team-profile  -->
                            </div><!-- .col -->
                            <div class="col-lg-3 col-sm-6">
                                <div class="team team-s5 animated" data-animate="fadeInUp" data-delay=".4">
                                    <div class="team-photo team-photo-s1">
                                        <img src="templates/styles/images/sq-b.jpg" alt="team" class="no-bdrs">
                                        <a href="#team-popup-2" class="team-show content-popup" data-overlay="bg-theme-grad-alternet"></a>
                                    </div>
                                    <h5 class="team-name title title-md"><?php echo $obj->main->teamteam_s5animatedh5_1; ?></h5>
                                    <span class="team-position"><?php echo $obj->main->team_popup_infopl_md_3p_3; ?></span>
                                    <ul class="team-social team-social-vr team-social-s2">
                                        <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                        <li><a href="#"><em class="fab fa-twitter"></em></a></li>
                                        <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                                    </ul>
                                </div>
                                <!-- <?php echo $obj->main->stage_infoanimatedh6_0; ?> .team-popup  -->
                                <div id="team-popup-2" class="team-popup mfp-hide">
                                    <a title="Close" class="mfp-close">×</a>
                                    <div class="row align-items-start">
                                        <div class="col-md-6">
                                            <div class="team-photo">
                                                <img src="templates/styles/images/b-color.jpg" alt="team">
                                            </div>
                                        </div><!-- .col  -->
                                        <div class="col-md-6">
                                            <div class="team-popup-info pl-md-3">
                                                <h3 class="team-name title title-lg pt-4"><?php echo $obj->main->team_popup_infopl_md_3h3_1; ?></h3>
                                                <p class="team-position mb-1"><?php echo $obj->main->team_popup_infopl_md_3p_3; ?></p>
                                                <ul class="team-social team-social-s2 mb-4">
                                                    <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                                    <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                                                </ul>
                                                <p><?php echo $obj->main->team_popup_infopl_md_3p_1; ?></p>
                                                <p><?php echo $obj->main->team_popup_infopl_md_3p_2; ?></p>
                                            </div>
                                        </div><!-- .col  -->
                                    </div><!-- .row  -->
                                </div><!-- .team-popup  -->
                            </div><!-- .col -->
                            <div class="col-lg-3 col-sm-6">
                                <div class="team team-s5 animated" data-animate="fadeInUp" data-delay=".5">
                                    <div class="team-photo team-photo-s1">
                                        <img src="templates/styles/images/sq-c.jpg" alt="team" class="no-bdrs">
                                        <a href="#team-popup-3" class="team-show content-popup" data-overlay="bg-theme-grad-alternet"></a>
                                    </div>
                                    <h5 class="team-name title title-md"><?php echo $obj->main->teamteam_s5animatedh5_2; ?></h5>
                                    <span class="team-position"><?php echo $obj->main->team_popup_infopl_md_3p_6; ?></span>
                                    <ul class="team-social team-social-vr team-social-s2">
                                        <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                        <li><a href="#"><em class="fab fa-twitter"></em></a></li>
                                        <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                                    </ul>
                                </div>
                                <!-- <?php echo $obj->main->stage_infoanimatedh6_0; ?> .team-profile  -->
                                <div id="team-popup-3" class="team-popup mfp-hide">
                                    <a title="Close" class="mfp-close">×</a>
                                    <div class="row align-items-start">
                                        <div class="col-md-6">
                                            <div class="team-photo">
                                                <img src="templates/styles/images/c-color.jpg" alt="team">
                                            </div>
                                        </div><!-- .col  -->
                                        <div class="col-md-6">
                                            <div class="team-popup-info pl-md-3">
                                                <h3 class="team-name title title-lg pt-4"><?php echo $obj->main->team_popup_infopl_md_3h3_2; ?></h3>
                                                <p class="team-position mb-1"><?php echo $obj->main->team_popup_infopl_md_3p_6; ?></p>
                                                <ul class="team-social team-social-s2 mb-4">
                                                    <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                                    <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                                                </ul>
                                                <p><?php echo $obj->main->team_popup_infopl_md_3p_1; ?></p>
                                                <p><?php echo $obj->main->team_popup_infopl_md_3p_2; ?></p>
                                            </div>
                                        </div><!-- .col  -->
                                    </div><!-- .row  -->
                                </div><!-- .team-profile  -->
                            </div><!-- .col -->
                            <div class="col-lg-3 col-sm-6">
                                <div class="team team-s5 animated" data-animate="fadeInUp" data-delay=".6">
                                    <div class="team-photo team-photo-s1">
                                        <img src="templates/styles/images/sq-d.jpg" alt="team" class="no-bdrs">
                                        <a href="#team-popup-4" class="team-show content-popup" data-overlay="bg-theme-grad-alternet"></a>
                                    </div>
                                    <h5 class="team-name title title-md"><?php echo $obj->main->teamteam_s5animatedh5_3; ?></h5>
                                    <span class="team-position"><?php echo $obj->main->team_popup_infopl_md_3p_9; ?></span>
                                    <ul class="team-social team-social-vr team-social-s2">
                                        <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                        <li><a href="#"><em class="fab fa-twitter"></em></a></li>
                                        <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                                    </ul>
                                </div>
                                <!-- <?php echo $obj->main->stage_infoanimatedh6_0; ?> .team-profile  -->
                                <div id="team-popup-4" class="team-popup mfp-hide">
                                    <a title="Close" class="mfp-close">×</a>
                                    <div class="row align-items-start">
                                        <div class="col-md-6">
                                            <div class="team-photo">
                                                <img src="templates/styles/images/d-color.jpg" alt="team">
                                            </div>
                                        </div><!-- .col  -->
                                        <div class="col-md-6">
                                            <div class="team-popup-info pl-md-3">
                                                <h3 class="team-name title title-lg pt-4"><?php echo $obj->main->team_popup_infopl_md_3h3_3; ?></h3>
                                                <p class="team-position mb-1"><?php echo $obj->main->team_popup_infopl_md_3p_9; ?></p>
                                                <ul class="team-social team-social-s2 mb-4">
                                                    <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                                    <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                                                </ul>
                                                <p><?php echo $obj->main->team_popup_infopl_md_3p_1; ?></p>
                                                <p><?php echo $obj->main->team_popup_infopl_md_3p_2; ?></p>
                                            </div>
                                        </div><!-- .col  -->
                                    </div><!-- .row  -->
                                </div><!-- .team-profile  -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div>
                    <div class="nk-block nk-block-team-list">
                        <div class="section-head section-head-sm text-center wide-auto-sm">
                            <h2 class="title-lg-2 title-semibold animated" data-animate="fadeInUp" data-delay=".7"><?php echo $obj->main->headhead_smtext_centerwide_auto_smh2_0; ?></h2>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-sm-6">
                                <div class="team team-s5 animated" data-animate="fadeInUp" data-delay=".8">
                                    <div class="team-photo team-photo-s1">
                                        <img src="templates/styles/images/sq-e.jpg" alt="team" class="no-bdrs">
                                        <a href="#team-popup-5" class="team-show content-popup" data-overlay="bg-theme-grad-alternet"></a>
                                    </div>
                                    <h5 class="team-name title title-md"><?php echo $obj->main->teamteam_s5animatedh5_4; ?></h5>
                                    <span class="team-position">CEO &amp; Lead <?php echo $obj->main->a_1; ?></span>
                                    <ul class="team-social team-social-vr team-social-s2">
                                        <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                        <li><a href="#"><em class="fab fa-twitter"></em></a></li>
                                        <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                                    </ul>
                                </div>
                                <!-- <?php echo $obj->main->stage_infoanimatedh6_0; ?> .team-profile  -->
                                <div id="team-popup-5" class="team-popup mfp-hide">
                                    <a title="Close" class="mfp-close">×</a>
                                    <div class="row align-items-start">
                                        <div class="col-md-6">
                                            <div class="team-photo">
                                                <img src="templates/styles/images/e-color.jpg" alt="team">
                                            </div>
                                        </div><!-- .col  -->
                                        <div class="col-md-6">
                                            <div class="team-popup-info pl-md-3">
                                                <h3 class="team-name title title-lg pt-4"><?php echo $obj->main->team_popup_infopl_md_3h3_0; ?></h3>
                                                <p class="team-position mb-1"><?php echo $obj->main->team_popup_infopl_md_3p_0; ?></p>
                                                <ul class="team-social team-social-s2 mb-4">
                                                    <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                                    <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                                                </ul>
                                                <p><?php echo $obj->main->team_popup_infopl_md_3p_1; ?></p>
                                                <p><?php echo $obj->main->team_popup_infopl_md_3p_2; ?></p>
                                                <div class="progress-list">
                                                    <div class="progress-wrap">
                                                        <div class="progress-title"><?php echo $obj->main->a_1; ?> <span class="progress-amount">85%</span></div>
                                                        <div class="progress-bar progress-bar-xs bg-black-10">
                                                            <div class="progress-percent bg-theme-grad-alternet" data-percent="85"></div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-wrap">
                                                        <div class="progress-title">Decentralization <span class="progress-amount">68%</span></div>
                                                        <div class="progress-bar progress-bar-xs bg-black-10">
                                                            <div class="progress-percent bg-theme-grad-alternet" data-percent="68"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col  -->
                                    </div><!-- .row  -->
                                </div><!-- .team-profile  -->
                            </div><!-- .col -->
                            <div class="col-lg-3 col-sm-6">
                                <div class="team team-s5 animated" data-animate="fadeInUp" data-delay=".9">
                                    <div class="team-photo team-photo-s1">
                                        <img src="templates/styles/images/sq-f.jpg" alt="team" class="no-bdrs">
                                        <a href="#team-popup-6" class="team-show content-popup" data-overlay="bg-theme-grad-alternet"></a>
                                    </div>
                                    <h5 class="team-name title title-md"><?php echo $obj->main->teamteam_s5animatedh5_1; ?></h5>
                                    <span class="team-position"><?php echo $obj->main->team_popup_infopl_md_3p_3; ?></span>
                                    <ul class="team-social team-social-vr team-social-s2">
                                        <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                        <li><a href="#"><em class="fab fa-twitter"></em></a></li>
                                        <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                                    </ul>
                                </div>
                                <!-- <?php echo $obj->main->stage_infoanimatedh6_0; ?> .team-popup  -->
                                <div id="team-popup-6" class="team-popup mfp-hide">
                                    <a title="Close" class="mfp-close">×</a>
                                    <div class="row align-items-start">
                                        <div class="col-md-6">
                                            <div class="team-photo">
                                                <img src="templates/styles/images/f-color.jpg" alt="team">
                                            </div>
                                        </div><!-- .col  -->
                                        <div class="col-md-6">
                                            <div class="team-popup-info pl-md-3">
                                                <h3 class="team-name title title-lg pt-4"><?php echo $obj->main->team_popup_infopl_md_3h3_1; ?></h3>
                                                <p class="team-position mb-1"><?php echo $obj->main->team_popup_infopl_md_3p_3; ?></p>
                                                <ul class="team-social team-social-s2 mb-4">
                                                    <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                                    <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                                                </ul>
                                                <p><?php echo $obj->main->team_popup_infopl_md_3p_1; ?></p>
                                                <p><?php echo $obj->main->team_popup_infopl_md_3p_2; ?></p>
                                            </div>
                                        </div><!-- .col  -->
                                    </div><!-- .row  -->
                                </div><!-- .team-popup  -->
                            </div><!-- .col -->
                            <div class="col-lg-3 col-sm-6">
                                <div class="team team-s5 animated" data-animate="fadeInUp" data-delay="1">
                                    <div class="team-photo team-photo-s1">
                                        <img src="templates/styles/images/sq-g.jpg" alt="team" class="no-bdrs">
                                        <a href="#team-popup-7" class="team-show content-popup" data-overlay="bg-theme-grad-alternet"></a>
                                    </div>
                                    <h5 class="team-name title title-md"><?php echo $obj->main->teamteam_s5animatedh5_2; ?></h5>
                                    <span class="team-position"><?php echo $obj->main->team_popup_infopl_md_3p_6; ?></span>
                                    <ul class="team-social team-social-vr team-social-s2">
                                        <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                        <li><a href="#"><em class="fab fa-twitter"></em></a></li>
                                        <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                                    </ul>
                                </div>
                                <!-- <?php echo $obj->main->stage_infoanimatedh6_0; ?> .team-profile  -->
                                <div id="team-popup-7" class="team-popup mfp-hide">
                                    <a title="Close" class="mfp-close">×</a>
                                    <div class="row align-items-start">
                                        <div class="col-md-6">
                                            <div class="team-photo">
                                                <img src="templates/styles/images/g-color.jpg" alt="team">
                                            </div>
                                        </div><!-- .col  -->
                                        <div class="col-md-6">
                                            <div class="team-popup-info pl-md-3">
                                                <h3 class="team-name title title-lg pt-4"><?php echo $obj->main->team_popup_infopl_md_3h3_2; ?></h3>
                                                <p class="team-position mb-1"><?php echo $obj->main->team_popup_infopl_md_3p_6; ?></p>
                                                <ul class="team-social team-social-s2 mb-4">
                                                    <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                                    <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                                                </ul>
                                                <p><?php echo $obj->main->team_popup_infopl_md_3p_1; ?></p>
                                                <p><?php echo $obj->main->team_popup_infopl_md_3p_2; ?></p>
                                            </div>
                                        </div><!-- .col  -->
                                    </div><!-- .row  -->
                                </div><!-- .team-profile  -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .block @e -->
                </div>
            </section>
            <!-- // -->
            <section class="section bg-white" id="partners">
                <div class="container">
                    <!-- Section Head @s -->
                    <div class="section-head text-center wide-auto-sm">
                        <h2 class="title title-s4 animated" data-animate="fadeInUp" data-delay=".1" title="<?php echo $obj->header->menu_itema_4; ?>">Smart <?php echo $obj->main->a_1; ?> <?php echo $obj->header->menu_itema_4; ?></h2>
                    </div><!-- .section-head @e -->
                    <!-- Block @s -->
                    <div class="nk-block block-partners">
                        <ul class="partner-list flex-wrap">
                            <li class="partner-logo-lg animated" data-animate="fadeInUp" data-delay=".2"><img src="templates/styles/images/a-md.png" alt="partner"></li>
                            <li class="partner-logo-lg animated" data-animate="fadeInUp" data-delay=".3"><img src="templates/styles/images/b-md.png" alt="partner"></li>
                            <li class="partner-logo-lg animated" data-animate="fadeInUp" data-delay=".4"><img src="templates/styles/images/c-md.png" alt="partner"></li>
                            <li class="partner-logo-lg animated" data-animate="fadeInUp" data-delay=".5"><img src="templates/styles/images/d-md.png" alt="partner"></li>
                            <li class="partner-logo-lg animated" data-animate="fadeInUp" data-delay=".6"><img src="templates/styles/images/e-md.png" alt="partner"></li>
                        </ul>
                    </div>
                    <!-- Block @e -->
                </div>
            </section>
            <!-- // -->
            <section class="section bg-light section-connect" id="media-partner">
               <div class="transform-line"></div>
                <div class="container">
                    <!-- Section Head @s -->
                    <div class="section-head wide-auto-sm text-center">
                        <h2 class="title-xs animated" data-animate="fadeInUp" data-delay=".1"><?php echo $obj->main->headwide_auto_smtext_centerh2_0; ?></h2>
                    </div><!-- .section-head @e -->
                    <!-- Block @s -->
                    <div class="nk-block block-partners">
                        <ul class="partner-list partner-list-s2 flex-wrap">
                            <li class="partner-logo-s2 animated" data-animate="fadeInUp" data-delay=".2"><img src="templates/styles/images/a-xs.png" alt="partner"></li>
                            <li class="partner-logo-s2 animated" data-animate="fadeInUp" data-delay=".25"><img src="templates/styles/images/b-xs.png" alt="partner"></li>
                            <li class="partner-logo-s2 animated" data-animate="fadeInUp" data-delay=".3"><img src="templates/styles/images/c-xs.png" alt="partner"></li>
                            <li class="partner-logo-s2 animated" data-animate="fadeInUp" data-delay=".35"><img src="templates/styles/images/d-xs.png" alt="partner"></li>
                            <li class="partner-logo-s2 animated" data-animate="fadeInUp" data-delay=".4"><img src="templates/styles/images/e-xs.png" alt="partner"></li>
                            <li class="partner-logo-s2 animated" data-animate="fadeInUp" data-delay=".45"><img src="templates/styles/images/f-xs.png" alt="partner"></li>
                            <li class="partner-logo-s2 animated" data-animate="fadeInUp" data-delay=".5"><img src="templates/styles/images/a-sm.png" alt="partner"></li>
                            <li class="partner-logo-s2 animated" data-animate="fadeInUp" data-delay=".55"><img src="templates/styles/images/b-sm.png" alt="partner"></li>
                            <li class="partner-logo-s2 animated" data-animate="fadeInUp" data-delay=".6"><img src="templates/styles/images/c-sm.png" alt="partner"></li>
                            <li class="partner-logo-s2 animated" data-animate="fadeInUp" data-delay=".65"><img src="templates/styles/images/d-sm.png" alt="partner"></li>
                        </ul>
                    </div>
                    <!-- Block @e -->
                </div>
            </section>
            <!-- // -->
            <section class="section section-contact bg-light-alt" id="blog">
                <div class="container">
                    <div class="section-head text-center wide-auto-sm">
                        <h2 class="title title-s4 animated" data-animate="fadeInUp" data-delay=".1" title="news"><?php echo $obj->main->headtext_centerwide_auto_smh2_5; ?></h2>
                    </div><!-- .section-head @e -->
                    <!-- Block @s -->
                    <div class="nk-block nk-block-blog">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-sm-9">
                                <div class="blog blog-s2 animated" data-animate="fadeInUp" data-delay=".2">
                                    <div class="blog-photo">
                                        <img src="templates/styles/images/a.jpg" alt="blog-thumb">
                                    </div>
                                    <div class="blog-text">
                                        <ul class="blog-meta">
                                            <li><a href="#"><?php echo $obj->main->a_0; ?></a></li>
                                            <li><a href="#"><?php echo $obj->main->a_1; ?></a></li>
                                        </ul>
                                        <h4 class="title title-sm"><a href="#">The Intersection with <?php echo $obj->main->a_1; ?>.</a></h4>
                                        <p><?php echo $obj->main->a_1; ?> Meets Energy Surplus of electrical energy is sometimes ut perspiciatis unde omnis iste natus...</p>
                                    </div>
                                </div><!-- .blog -->
                            </div><!-- .col -->
                            <div class="col-lg-4 col-sm-9">
                                <div class="blog blog-s2 animated" data-animate="fadeInUp" data-delay=".3">
                                    <div class="blog-photo">
                                        <img src="templates/styles/images/b.jpg" alt="blog-thumb">
                                    </div>
                                    <div class="blog-text">
                                        <ul class="blog-meta">
                                            <li><a href="#"><?php echo $obj->main->a_0; ?></a></li>
                                            <li><a href="#"><?php echo $obj->main->a_1; ?></a></li>
                                        </ul>
                                        <h4 class="title title-sm"><a href="#">The Intersection with <?php echo $obj->main->a_1; ?>.</a></h4>
                                        <p><?php echo $obj->main->a_1; ?> Meets Energy Surplus of electrical energy is sometimes ut perspiciatis unde omnis iste natus...</p>
                                    </div>
                                </div><!-- .blog -->
                            </div><!-- .col -->
                            <div class="col-lg-4 col-sm-9">
                                <div class="blog blog-s2 animated" data-animate="fadeInUp" data-delay=".4">
                                    <div class="blog-photo">
                                        <img src="templates/styles/images/c.jpg" alt="blog-thumb">
                                    </div>
                                    <div class="blog-text">
                                        <ul class="blog-meta">
                                            <li><a href="#"><?php echo $obj->main->a_0; ?></a></li>
                                            <li><a href="#"><?php echo $obj->main->a_1; ?></a></li>
                                        </ul>
                                        <h4 class="title title-sm"><a href="#">The Intersection with <?php echo $obj->main->a_1; ?>.</a></h4>
                                        <p><?php echo $obj->main->a_1; ?> Meets Energy Surplus of electrical energy is sometimes ut perspiciatis unde omnis iste natus...</p>
                                    </div>
                                </div><!-- .blog -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .block @e -->
                    <div class="text-center pdt-r animated" data-animate="fadeInUp" data-delay=".5">
                        <a href="#" class="link link-primary link-uc link-animate"><?php echo $obj->main->text_centerpdt_ranimateda_0; ?></a>
                    </div>
                </div>
            </section>
            <!-- // -->
            <section class="section bg-white pb-0" id="faqs">
                <div class="container">
                    <div class="section-head text-center wide-auto-sm">
                        <h2 class="title title-s4 animated" data-animate="fadeInUp" data-delay=".1" title="FAQS"><?php echo $obj->main->headtext_centerwide_auto_smh2_6; ?></h2>
                        <p class="animated" data-animate="fadeInUp" data-delay=".2"><?php echo $obj->main->headtext_centerwide_auto_smp_3; ?></p>
                    </div><!-- .section-head @e -->
                    <!-- Block @s -->
                    <div class="nk-block">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-10">
                                <ul class="nav tab-nav tab-nav-line mgb-r animated" data-animate="fadeInUp" data-delay=".3">
                                    <li><a class="active" data-toggle="tab" href="#general-questions-19"><?php echo $obj->main->a_6; ?></a></li>
                                    <li><a data-toggle="tab" href="#ico-questions-19"><?php echo $obj->main->a_7; ?></a></li>
                                    <li><a data-toggle="tab" href="#tokens-sales-19"><?php echo $obj->main->a_8; ?></a></li>
                                    <li><a data-toggle="tab" href="#client-19"><?php echo $obj->main->a_9; ?></a></li>
                                    <li><a data-toggle="tab" href="#legal-19"><?php echo $obj->main->a_10; ?></a></li>
                                </ul>
                                <div class="tab-content animated" data-animate="fadeInUp" data-delay=".4">
                                    <div class="tab-pane fade show active" id="general-questions-19">
                                        <div class="accordion accordion-faq" id="faq-67">
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title" data-toggle="collapse" data-target="#faq-67-1">
                                                    What is Smart <?php echo $obj->main->a_1; ?>? 
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-67-1" class="collapse show" data-parent="#faq-67">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-67-2">
                                                    What cryptocurrencies can I use to purchase? 
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-67-2" class="collapse" data-parent="#faq-67">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-67-3">
                                                    How can I participate in the ICO <?php echo $obj->main->a_8; ?> sale? 
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-67-3" class="collapse" data-parent="#faq-67">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-67-4">
                                                    How do I benefit from the ICO <?php echo $obj->main->a_8; ?>? 
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-67-4" class="collapse" data-parent="#faq-67">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="ico-questions-19">
                                        <div class="accordion accordion-faq" id="faq-68">
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title" data-toggle="collapse" data-target="#faq-68-1">
                                                    Which of us ever undertakes laborious?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-68-1" class="collapse show" data-parent="#faq-68">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-68-2">
                                                    Who do not know how to pursue rationally?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-68-2" class="collapse" data-parent="#faq-68">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-68-3">
                                                    Their separate existence is a myth?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-68-3" class="collapse" data-parent="#faq-68">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-68-4">
                                                    Pityful a rethoric question ran over her cheek?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-68-4" class="collapse" data-parent="#faq-68">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tokens-sales-19">
                                        <div class="accordion accordion-faq" id="faq-69">
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title" data-toggle="collapse" data-target="#faq-69-1">
                                                    When she reached the first hills?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-69-1" class="collapse show" data-parent="#faq-69">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-69-2">
                                                    Big Oxmox advised her not to do?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-69-2" class="collapse" data-parent="#faq-69">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-69-3">
                                                    Which roasted parts of sentences fly into your mouth?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-69-3" class="collapse" data-parent="#faq-69">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-69-4">
                                                    Vokalia and Consonantia, there live?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-69-4" class="collapse" data-parent="#faq-69">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="client-19">
                                        <div class="accordion accordion-faq" id="faq-70">
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title" data-toggle="collapse" data-target="#faq-70-1">
                                                    When she reached the first hills?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-70-1" class="collapse show" data-parent="#faq-70">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-70-2">
                                                    Big Oxmox advised her not to do?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-70-2" class="collapse" data-parent="#faq-70">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-70-3">
                                                    Which roasted parts of sentences fly into your mouth?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-70-3" class="collapse" data-parent="#faq-70">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-70-4">
                                                    Vokalia and Consonantia, there live?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-70-4" class="collapse" data-parent="#faq-70">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="legal-19">
                                        <div class="accordion accordion-faq" id="faq-71">
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title" data-toggle="collapse" data-target="#faq-71-1">
                                                    When she reached the first hills?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-71-1" class="collapse show" data-parent="#faq-71">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-71-2">
                                                    Big Oxmox advised her not to do?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-71-2" class="collapse" data-parent="#faq-71">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-71-3">
                                                    Which roasted parts of sentences fly into your mouth?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-71-3" class="collapse" data-parent="#faq-71">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item accordion-item-s4 bg-light">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#faq-71-4">
                                                    Vokalia and Consonantia, there live?
                                                    <span class="accordion-icon accordion-icon-s2"></span>
                                                </h5>
                                                <div id="faq-71-4" class="collapse" data-parent="#faq-71">
                                                    <div class="accordion-content">
                                                        <p>Once ICO period is launched, You can purchased <?php echo $obj->main->a_8; ?> with Etherum, Bitcoin or Litecoin. You can also tempor incididunt ut labore et dolore magna aliqua sed do eiusmod eaque ipsa.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .block @e -->
                </div>
            </section>
            <!-- // -->
            <section class="section section-contact bg-white" id="contact">
                <div class="container">
                    <div class="section-head text-center wide-auto-sm">
                        <h2 class="title title-s4 animated" data-animate="fadeInUp" data-delay=".1" title="<?php echo $obj->header->menu_itema_8; ?>"><?php echo $obj->header->menu_itema_8; ?> Smart <?php echo $obj->main->a_1; ?></h2>
                        <p class="animated" data-animate="fadeInUp" data-delay=".2"><?php echo $obj->main->headtext_centerwide_auto_smp_4; ?></p>
                    </div><!-- .section-head @e -->
                    <!-- Block @s -->
                    <div class="nk-block block-contact">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-8 col-lg-10">
                                <ul class="contact-list contact-list-s1 flex-wrap flex-md-nowrap pdb-l">
                                    <li class="animated" data-animate="fadeInUp" data-delay=".3">
                                        <em class="contact-icon fas fa-phone"></em>
                                        <div class="contact-text">
                                            <span>+44 0123 4567</span>
                                        </div>
                                    </li>
                                    <li class="animated" data-animate="fadeInUp" data-delay=".4">
                                        <em class="contact-icon fas fa-envelope"></em>
                                        <div class="contact-text">
                                            <span>info@company.com</span>
                                        </div>
                                    </li>
                                    <li class="animated" data-animate="fadeInUp" data-delay=".5">
                                        <em class="contact-icon fas fa-paper-plane"></em>
                                        <div class="contact-text">
                                            <span>Join us on Telegram</span>
                                        </div>
                                    </li>
                                </ul>
                            </div><!-- .col -->
                            <div class="col-xl-8 col-lg-10">
                                <div class="contact-wrap p-0">
                                    <form id="contact-form-01" class="contact-form nk-form-submit" action="form/contact.php" method="post">
                                        <div class="field-item field-item-center animated" data-animate="fadeInUp" data-delay=".6">
                                            <input name="contact-name" type="text" class="input-line required">
                                            <label class="field-label field-label-line">Your Name</label>
                                        </div>
                                        <div class="field-item field-item-center animated" data-animate="fadeInUp" data-delay=".7">
                                            <input name="contact-email" type="email" class="input-line input-line-center required email">
                                            <label class="field-label field-label-line">Your Email</label>
                                        </div>
                                        <div class="field-item field-item-center animated" data-animate="fadeInUp" data-delay=".8">
                                            <textarea name="contact-message" class="input-line input-line-center input-textarea required"></textarea>
                                            <label class="field-label field-label-line">Your Message</label>
                                        </div>
                                        <input type="text" class="d-none" name="form-anti-honeypot" value="">
                                        <div class="field-wrap animated" data-animate="fadeInUp" data-delay=".9">
                                            <button type="submit" class="btn btn-md btn-round btn-lg btn-grad">Submit</button>
                                            <div class="form-results"></div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .block @e -->
                </div>
            </section>
            <!-- // -->
        </main>
        <footer class="nk-footer bg-light section-connect">
            <div class="section section-m pb-0 ov-h">
                <div class="container py-4">
                    <!-- Block @s -->
                    <div class="nk-block pb-lg-5">
                        <div class="row justify-content-center text-center">
                            <div class="col-lg-6 col-md-9">
                                <div class="wide-auto-sm section-head section-head-sm pdb-r">
                                    <h4 class="title title-md animated" data-animate="fadeInUp" data-delay=".1"><?php echo $obj->footer->wide_auto_smheadhead_smpdb_rh4_0; ?></h4>
                                </div>
                                <form action="form/subscribe.php" class="nk-form-submit" method="post">
                                    <div class="field-inline field-inline-round field-inline-s2-sm bg-white shadow-soft animated" data-animate="fadeInUp" data-delay=".2">
                                        <div class="field-wrap">
                                            <input class="input-solid input-solid-md required email" type="text" name="contact-email" placeholder="Enter your email">
                                            <input type="text" class="d-none" name="form-anti-honeypot" value="">
                                        </div>
                                        <div class="submit-wrap">
                                            <button class="btn btn-md btn-round btn-secondary h-100">Subscribe</button>
                                        </div>
                                    </div>
                                    <div class="form-results"></div>
                                </form>
                            </div>
                        </div>
                    </div><!-- .block @e -->
                </div>
                <div class="nk-ovm shape-contain shape-center-top shape-p"></div>
            </div>
            <div class="section section-footer section-s bg-transparent">
                <div class="container">
                    <!-- Block @s -->
                    <div class="nk-block block-footer">
                        <div class="row">
                            <div class="col">
                                <div class="wgs wgs-text text-center mb-3">
                                    <ul class="social pdb-m justify-content-center">
                                        <li><a href="#"><em class="social-icon fab fa-facebook-f"></em></a></li>
                                        <li><a href="#"><em class="social-icon fab fa-twitter"></em></a></li>
                                        <li><a href="#"><em class="social-icon fab fa-youtube"></em></a></li>
                                        <li><a href="#"><em class="social-icon fab fa-github"></em></a></li>
                                        <li><a href="#"><em class="social-icon fab fa-bitcoin"></em></a></li>
                                        <li><a href="#"><em class="social-icon fab fa-medium-m"></em></a></li>
                                    </ul>
                                    <div class="copyright-text copyright-text-s3 pdt-m">
                                        <p><span class="d-sm-block">Copyright &copy; 2018, Smart <?php echo $obj->main->a_1; ?>. Template Made By <a href="./">Smart <?php echo $obj->main->a_1; ?></a> &amp; Handcrafted by iO. </span>All trademarks and copyrights belong to their respective owners.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .block @e -->
                </div>
            </div>
        </footer>
	</div>
	
	<div class="preloader"><span class="spinner spinner-round"></span></div>
	
	<!-- JavaScript -->
	<script src="templates/styles/js/jquery.bundle.js?ver=1930"></script>
	<script src="templates/styles/js/scripts.js?ver=1930"></script>
	<script src="templates/styles/js/charts.js"></script>
</body>

</html>