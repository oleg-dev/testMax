<?php
session_start();
error_reporting(0);

require 'langs/GetLanguageByCountry.php';

if (!empty(ltrim($_SERVER['REQUEST_URI'], '/'))) {
  $_SESSION['lang'] = trim(strip_tags(ltrim($_SERVER['REQUEST_URI'], '/')));
  setcookie('lang', trim(strip_tags(ltrim($_SERVER['REQUEST_URI'], '/'))), time() + 2592000);
} elseif (isset($_COOKIE['lang'])) {
  $_SESSION['lang'] = $_COOKIE['lang'];
} else {
    $_SESSION['lang'] = getLanguageByCountry($_SERVER['REMOTE_ADDR']);
}
  if (file_exists('langs/' . $_SESSION['lang'] . '.php')) {
    require 'langs/' . $_SESSION['lang'] . '.php';
  } else {
    exit(header('Location: /404'));
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crypto Bazar</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!--<meta name="description" content="" />-->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- <meta name="keywords" content="" /> -->
    <meta name="author" content="Crypto Bazar">
    <!--<meta property="og:url" content="http://cryptobazar.io"/>-->
    <meta property="og:title" content="Crypto BAZAR"/>
    <meta property="og:description"
          content="<?php echo $meta_descrioption; ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="media/images/beidge.png"/>

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <!--<link rel="stylesheet" href="css/reset.css" type="text/css"/>-->
    <!--<link rel="stylesheet" href="css/fonts.css" type="text/css"/>-->
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <link rel="shortcut icon" href="media/images/favicon.ico" type="image/x-icon" />

</head>

<body>

    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_four"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_one"></div>
            </div>
        </div>
    </div>
    <header id="section-header">
    <div class="content-wrapper" style="position: relative;">
        <a href="#" class="logo"></a>
        <button class="open-menu-button" id="menuButton">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <nav class="top-menu">
            <ul class="menu-list" id="menu">
              <?php foreach ($menu as $k => $menu_item): ?>
                  <li>
                    <a href="<?php echo $k; ?>"><?php echo $menu_item; ?></a>
                  </li>
              <?php endforeach; ?>
            </ul>
        </nav>
        <div class="langs">
          <a href="/ru" class="<?php if ($_SESSION['lang'] == "ru") echo 'active'?>">RU</a> |
          <a href="/en" class="<?php if ($_SESSION['lang'] == "en") echo 'active'?>">EN</a>
        </div>
    </div>
</header>

<section id="section1">
    <img class="logo" src="media/images/cb-logo-white.png" alt="logo CryptoBazar">
    <div class="video-bg">
        <video playsinline muted autoplay loop id="videoBg">
            <source src="media/video/cryptobazar.mp4" type="video/mp4"/>
            <source src="media/video/cryptobazar.webm" type="video/webm"/>
            <source src="media/video/cryptobazar.ogg" type="video/ogg"/>
        </video>
    </div>
    <div class="content-wrapper">
        <h1 class="header">
            <?php echo $header['big-text']; ?>
        </h1>
        <p class="description"><?php echo $header['description']; ?></p>
    </div>
    <div class="property-wrapper">
        <div class="properties">
          <?php foreach ($investment_mob as $heading => $point_text): ?>
            <div class="point">
                <p class="heading"><?php echo $heading; ?></p>
                <p class="point-text"><?php echo $point_text; ?></p>
            </div>
          <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="section2">
    <div class="content-wrapper">
        <div class="event-wrapper">
            <p class="event-date">
                <?php echo $header['date']; ?>
            </p>
            <p class="event-name">
                <strong>CryptoBazar Pre-ICO Day</strong>
            </p>
            <a href="https://www.youtube.com/embed/nf7Ee-rtlX0?rel=0" target="_blank"
               class="go-to-event"><?php echo $header['record']; ?></a>
        </div>
    </div>
</section>

<section id="section3">
    <div class="content-wrapper">
        <p class="caption"><?php echo array_shift($investment); ?></p>

        <div class="info-blocks-container">
          <?php foreach ($investment as $invest_k => $invest_v): ?>
            <div class="info-block">
                <p class="info-block-heading"><?php echo $invest_k; ?></p>
                <div class="line"></div>
                <p class="info-block-description"><?php echo $invest_v; ?></p>
            </div>
          <?php endforeach; ?>
        </div>

        <a href="https://docs.google.com/forms/d/19oOeMoifaAvke1bQHrPnkYX3-birJ1gfJkQ6PJRl44E/viewform?edit_requested=true"
           class="more-button" target="_blank"><?php echo $learn_more; ?></a>
    </div>
</section>

<section id="section4">
    <div class="content-wrapper">
        <h2><?php echo $team_name; ?></h2>
        <h4><?php echo $team_desc; ?></h4>

        <div class="column-container">
          <?php foreach ($people as $people_k => $people_v): ?>
            <div class="column">
              <img src="<?php echo $people_v['img']; ?>" alt="">
              <p class="column-description">
                <span class="column-title"><?php echo $people_k; ?></span><br>
                <?php echo $people_v['achievments']; ?>
              </p>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="companies-list">
            <div class="companies-list-item">
                <a href="http://investbazar.com/event/" target="_blank">
                    <img src="media/images/section4/investbazar.png" alt="">
                </a>
            </div>
            <div class="companies-list-item">
                <img src="media/images/section4/cryptobazar.png" alt="">
            </div>
            <div class="companies-list-item">
                <a href="http://wavesplatform.com/" target="_blank">
                    <img src="media/images/section4/waves.png" alt="">
                </a>
            </div>
            <div class="companies-list-item">
                <a href="https://www.aton.ru/" target="_blank">
                    <img src="media/images/section4/aton.png" alt="">
                </a>
            </div>
        </div>
    </div>
</section>

<section id="section5">
    <div class="content-wrapper">
        <h2><?php echo $instrument_head; ?></h2>
        <h4><?php echo $instrument_desc; ?></h4>

        <div class="columns-wrapper">
          <?php foreach ($instruments_list as $il_k => $il_v): ?>
            <div class="column <?php echo $il_v['class'];?>">
              <p class="column-title"><?php echo $il_v['name']; ?></p>

              <div class="column-block">
                  <div><img src="<?php echo $il_v['img']; ?>" alt=""></div>
                  <p><?php echo $il_v['desc1'];?></p>
              </div>

              <p class="column-text"><strong><?php echo $il_v['desc2'];?></strong></p>
              <?php echo $il_v['desc3']; ?>

              <p class="column-text"><?php echo $il_v['desc4']; ?></p>
              <?php echo $il_v['desc5']; ?>
            </div>
          <?php endforeach; ?>
            <img src="media/images/section4/arrow-big.png" alt="" class="arrow-image">
        </div>
    </div>
</section>

<section id="section6">
    <div class="content-wrapper">
        <h2><?php echo $stat_head; ?></h2>
        <h4><?php echo $stat_desc; ?></h4>

        <img src="<?php echo $src1; ?>" class="statistic-image zoom-image">

        <h4 class="carousel-title"><?php echo $stat_carousel_title; ?></h4>

        <div class="slick-carousel">
            <div class="row">
                <img src="media/images/section6/1-01.png" alt="">
                <img src="media/images/section6/1-02.png" alt="">
                <img src="media/images/section6/1-03.png" alt="">
                <img src="media/images/section6/1-04.png" alt="">
                <img src="media/images/section6/1-05.png" alt="">
                <img src="media/images/section6/1-06.png" alt="">
            </div>
            <div class="row">
                <img src="media/images/section6/1-07.png" alt="">
                <img src="media/images/section6/1-08.png" alt="">
                <img src="media/images/section6/1-09.png" alt="">
                <img src="media/images/section6/1-10.png" alt="">
                <img src="media/images/section6/1-11.png" alt="">
                <img src="media/images/section6/1-12.png" alt="">
            </div>
            <div class="row">
                <img src="media/images/section6/1-13.png" alt="">
                <img src="media/images/section6/1-14.png" alt="">
                <img src="media/images/section6/1-15.png" alt="">
                <img src="media/images/section6/1-16.png" alt="">
                <img src="media/images/section6/1-17.png" alt="">
                <img src="media/images/section6/1-18.png" alt="">
            </div>
            <div class="row">
                <img src="media/images/section6/1-19.png" alt="">
                <img src="media/images/section6/1-20.png" alt="">
                <img src="media/images/section6/1-21.png" alt="">
                <img src="media/images/section6/1-22.png" alt="">
                <img src="media/images/section6/1-23.png" alt="">
                <img src="media/images/section6/1-24.png" alt="">
            </div>
            <div class="row">
                <img src="media/images/section6/statis.png" alt="">
            </div>
        </div>
    </div>
</section>

<section id="section7">
    <div class="content-wrapper">
        <a href="https://docs.google.com/forms/d/19oOeMoifaAvke1bQHrPnkYX3-birJ1gfJkQ6PJRl44E/viewform?edit_requested=true"
           class="more-button" target="_blank"><?php echo $learn_more; ?></a>
    </div>
</section>

<section id="section8">
    <div class="content-wrapper">
        <h2><?php echo $model_head; ?></h2>
        <h4><?php echo $model_desc; ?></h4>

        <img src="<?php echo $src2; ?>"" alt="statistic" class="statistic-image zoom-image">
    </div>
</section>

<section id="section9">
    <div class="content-wrapper">
        <h2><?php echo $selection_head; ?></h2>
        <div class="steps-wrap">
          <?php foreach ($steps as $step_k => $step_v): ?>
              <div class="step <?php echo $step_v['class']; ?>">
                <h5><?php echo $step_k; ?></h5>
                <p class="subtitle"><?php echo $step_v['subtitle']; ?></p>
                <div class="description-list">
                  <?php echo $step_v['desc-list']; ?>
                </div>
                <img src="<?php echo $step_v['img']; ?>" alt="project selection" class="step-img">
              </div>
          <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="section10">
    <div class="content-wrapper">
        <a href="https://docs.google.com/forms/d/19oOeMoifaAvke1bQHrPnkYX3-birJ1gfJkQ6PJRl44E/viewform?edit_requested=true"
           class="more-button" target="_blank"><?php echo $learn_more; ?></a>
    </div>
</section>

<section id="section11">
    <div id="particles-js"></div>
    <div class="content-wrapper">
        <h2>
            <?php echo $roadmap_head; ?>
        </h2>

        <div class="roadmap">
          <?php foreach ($roadmap_list as $rl_k => $rl_v): ?>
            <div class="roadmap-item <?php echo $rl_v['class']; ?>">
              <p class="roadmap-item-caption <?php echo $rl_v['add-class']; ?>">
                <?php echo $rl_v['text']; ?>
              </p>
              <div class="roadmap-item-number">
                <p><?php echo $rl_k; ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="section12">
    <div class="content-block block1">
        <h2 class="header"><?php echo $strategy_head; ?></h2>
        <ul class="strategy-list">
            <?php echo $strategy_list; ?>
        </ul>
    </div>
    <div class="content-block block2">
        <h2 class="header"><?php echo $strategy_invest_head; ?></h2>
        <?php echo $strategy_invest_list; ?>
        <a href="https://docs.google.com/forms/d/19oOeMoifaAvke1bQHrPnkYX3-birJ1gfJkQ6PJRl44E/viewform?edit_requested=true"
           target="_blank">
            <button class="request"><?php echo $strategy_button; ?></button>
        </a>
    </div>
</section>

<footer id="footer-section">
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5342.058613512177!2d37.50423280070454!3d55.7401043840291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54bfd9d9d774b%3A0x7df7bdf2ee74527a!2z0YPQuy4g0JHQsNGA0LrQu9Cw0Y8sIDYsINCc0L7RgdC60LLQsCwg0KDQvtGB0YHQuNGPLCAxMjEwODc!5e0!3m2!1sru!2sua!4v1501102509758"
                width="800" height="900" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="contact-wrap">
        <div class="contacts">
            <?php echo $contact_info; ?>
        </div>
    </div>
</footer>

<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter45514032 = new Ya.Metrika({ id:45514032, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/45514032" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

<div class="zoomer-wrapper" id="zoomerWrapper">
    <div class="close-btn">
        <div class="line-first"></div>
        <div class="line-second"></div>
    </div>
    <img src="#" id="zoomerImage">
</div>


<div class="under-layer" id="underLayer">
    <div class="mobile-right-menu">
        <a href="#" class="logo"></a>
        <nav class="right-menu">
            <ul class="mobile-menu-list" id="menuMobile">
              <?php foreach ($menu as $k => $menu_item): ?>
                  <li>
                    <a href="<?php echo $k; ?>"><?php echo $menu_item; ?></a>
                  </li>
              <?php endforeach; ?>
            </ul>
        </nav>
        <div class="close-btn" id="closeMobileMenu">
            <div class="line-first"></div>
            <div class="line-second"></div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" defer></script>
<script src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js" defer></script>
<script src="js/script.js" defer></script>
</body>

</html>
