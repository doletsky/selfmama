<!DOCTYPE html>
<html>
    <head>
        <? global $APPLICATION; ?>
        <? global $USER; ?>
        <meta charset="utf-8">

        <title><? $APPLICATION->ShowTitle(); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?$url = $APPLICATION->GetCurPage();?>
        <meta property="og:url" content="http://<?=$_SERVER['SERVER_NAME']?><?=$APPLICATION->GetCurPageParam("fbrefresh=CAN_BE_ANYTHING");?>">
        <meta property="og:image" content="<?$APPLICATION->ShowViewContent('facebook_share_image')?>"/>
        <?/*?><meta name="viewport" content="width=device-width, initial-scale=1.0"><?*/?>

        <? $APPLICATION->SetAdditionalCSS(STATIC_PATH . "css/reset.css"); ?>
        <? $APPLICATION->SetAdditionalCSS(STATIC_PATH . "css/fonts.css"); ?>
        <? $APPLICATION->SetAdditionalCSS(STATIC_PATH . "css/jquery.fancybox.css"); ?>
        <? $APPLICATION->SetAdditionalCSS(STATIC_PATH . "css/jquery.formstyler.css"); ?>
        <? $APPLICATION->SetAdditionalCSS(STATIC_PATH . "css/style.css"); ?>
        <? $APPLICATION->SetAdditionalCSS(STATIC_PATH . "css/responsive.css"); ?>
        <? $APPLICATION->SetAdditionalCSS(STATIC_PATH . "css/justifiedGallery.min.css"); ?>
        <? $APPLICATION->SetAdditionalCSS(DEFAULT_TEMPLATE_PATH_CUSTOM . "css/custom.css"); ?>


        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/jquery-1.7.2.js"); ?>

        <? $APPLICATION->AddHeadScript("/local/php_interface/include/vendor/phery/phery/phery.min.js")?>

        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/jquery.touchSwipe.min.js"); ?>
        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/jquery.carouFredSel-6.2.1.js"); ?>

        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/jquery.fancybox.pack.js"); ?>
        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/materialmenu.jquery.min.js"); ?>
        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/isMobile.min.js"); ?>
        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/jquery.formstyler.min.js"); ?>
        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/jquery.mousewheel.js"); ?>
        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/jquery.maskedinput.min.js"); ?>
        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/jquery.touchSwipe.min.js"); ?>
        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/jquery-ui.min.js"); ?>
        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/jquery-scrollspy.js"); ?>
        <?/* $APPLICATION->AddHeadScript(STATIC_PATH . "js/jquery.transit.min.js");*/ ?>
        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/jquery.justifiedGallery.3.6.0-EDITED.min.js"); ?>
        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/main.js"); ?>
        <? $APPLICATION->AddHeadScript(STATIC_PATH . "js/jquery-ui.min.js"); ?>


        <script type="text/javascript" src="http://yastatic.net/share/share.js" charset="utf-8"></script>
        <script src="http://maps.googleapis.com/maps/api/js"></script>

        <?/* $APPLICATION->AddHeadScript(DEFAULT_TEMPLATE_PATH_CUSTOM . "js/conjoined.js"); */?>
        <? $APPLICATION->AddHeadScript(DEFAULT_TEMPLATE_PATH_CUSTOM . "js/jquery.truncate.js"); ?>
        <? $APPLICATION->AddHeadScript(DEFAULT_TEMPLATE_PATH_CUSTOM . "js/custom.js"); ?>

        <? $APPLICATION->ShowHead(); ?>
        <? define("AUTHORIZED", intval($USER->IsAuthorized())); ?>
        <? define("MAIN_PAGE", intval($APPLICATION->GetCurPage() == "/")); ?>
        <? define("ABOUT_PAGE", intval($APPLICATION->GetCurDir() == "/about/")); ?>
        <!--[if lt IE 9]>
        <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
        <script>
            $(function () {
                $.post(
                    'https://graph.facebook.com',
                    {
                        id: '<?php echo $url; ?>',
                        scrape: true
                    },
                    function(response){
                        console.log(response);
                    }
                );
            });
        </script>
        <![endif]-->
        <style>
        <?$APPLICATION->ShowViewContent('runtime_css')?>
        </style>
    </head>
    <body>
        <?define('DEFAULT_HEADER_IMAGE', BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'header_default_image')));?>
        <?
        $APPLICATION->ShowPanel();
        ?>
        <div id="container" class="<? $APPLICATION->showProperty("HEADER_CLASS"); ?>">
            <?if (MAIN_PAGE) {?><div class="header">
                <?} else {
                    $APPLICATION->ShowViewContent('page_wrapper_open');
                }?>


                <?
                $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                        "AREA_FILE_SHOW" => "sect",
                        "AREA_FILE_SUFFIX" => "menu_hide",
                        "AREA_FILE_RECURSIVE" => "Y",
                    )
                );
                ?>

                <?
                $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                        "AREA_FILE_SHOW" => "sect",
                        "AREA_FILE_SUFFIX" => "menu",
                        "AREA_FILE_RECURSIVE" => "Y",
                    )
                );
                ?>

                <?
                $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                        "AREA_FILE_SHOW" => "page",
                        "AREA_FILE_SUFFIX" => "slider",
                        "AREA_FILE_RECURSIVE" => "Y",
                    )
                );
                ?>
                <?
                $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                        "AREA_FILE_SHOW" => "sect",
                        "AREA_FILE_SUFFIX" => "header_image",
                        "AREA_FILE_RECURSIVE" => "Y"
                    ), true
                );
                ?>
                <div class="rss-form">

                    <img src="<?=STATIC_PATH;?>images/rss-close.png" width="10" height="10" alt=""/>
                    <div class="plashka">

                    </div>

                    <div class="ins">


                        <p>Подпишитесь на новости Selfmama!
                            <br/>Лучшие статьи, полезные советы
                            <br/>и анонсы самых важных событий.</p>
                        <?=Phery::form_for('/include/subscribe.php', 'subscribe_1');?>
                        <div class="item" id="subscribe_1">
                            <input placeholder="Ваш e-mail" type="text"/>
                        </div>

                        <button class="btn fw700" type="submit">Подписаться</button>
                        </form>
                    </div>

                </div>
                <?if (MAIN_PAGE) {?></div><?}?>