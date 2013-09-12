<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/packages/jui/js/jquery.js"></script>
        <meta charset="utf-8">

        <!-- Use the .htaccess and remove these lines to avoid edge case issues.
                         More info: h5bp.com/b/378 -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="humans.txt">

        <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />

        <!-- Facebook Metadata /-->
        <meta property="fb:page_id" content="" />
        <meta property="og:image" content="" />
        <meta property="og:description" content=""/>
        <meta property="og:title" content=""/>

        <!-- Google+ Metadata /-->
        <meta itemprop="name" content="">
        <meta itemprop="description" content="">
        <meta itemprop="image" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

        <!-- We highly recommend you use SASS and write your custom styles in sass/_custom.scss.
                         However, there is a blank style.css in the css directory should you prefer -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/gumby.css">
        <!-- <link rel="stylesheet" href="css/gumby-style.css"> -->

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/libs/modernizr-2.6.2.min.js"></script>
        <title>Obeid Machinery</title>
    </head>

    <body>
        <div id="container">
            <?php echo $content; ?>
        </div>


        <!-- Grab Google CDN's jQuery, fall back to local if offline -->
        <!-- 2.0 for modern browsers, 1.10 for .oldie -->
        <script>
            var oldieCheck = Boolean(document.getElementsByTagName('html')[0].className.match(/\soldie\s/g));
            if (!oldieCheck) {
                document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"><\/script>');
            } else {
                document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"><\/script>');
            }
        </script>
        <script>
            if (!window.jQuery) {
                if (!oldieCheck) {
                    document.write('<script src="js/libs/jquery-2.0.2.min.js"><\/script>');
                } else {
                    document.write('<script src="js/libs/jquery-1.10.1.min.js"><\/script>');
                }
            }
        </script>

        <!--
        Include gumby.js followed by UI modules.
        Or concatenate and minify into a single file
        <script src="js/libs/gumby.js"></script>
        <script src="js/libs/ui/gumby.retina.js"></script>
        <script src="js/libs/ui/gumby.fixed.js"></script>
        <script src="js/libs/ui/gumby.skiplink.js"></script>
        <script src="js/libs/ui/gumby.toggleswitch.js"></script>
        <script src="js/libs/ui/gumby.checkbox.js"></script>
        <script src="js/libs/ui/gumby.radiobtn.js"></script>
        <script src="js/libs/ui/gumby.tabs.js"></script>
        <script src="js/libs/ui/gumby.navbar.js"></script>
        <script src="js/libs/ui/gumby.fittext.js"></script>
        <script src="js/libs/ui/jquery.validation.js"></script>
        <script src="js/libs/gumby.init.js"></script>-->

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/libs/gumby.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>

        <!-- Change UA-XXXXX-X to be your site's ID -->
        <!--<script>
        window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
        Modernizr.load({
          load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
        });
        </script>-->

        <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
           chromium.org/developers/how-tos/chrome-frame-getting-started -->
        <!--[if lt IE 7 ]>
        <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
        <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
        <![endif]-->
    </body>
</html>