<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="big-article">
    <div class="item">
        <strong class="c-blue date">
            <?=$arResult['DISPLAY_ACTIVE_FROM']?>
        </strong>

        <h1><?=$arResult['NAME']?></h1>

        <div class="img">
<!--            <div class="overlay"></div>-->
            <img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="">
            <div class="info">
                <div class="ins">
                    <?foreach ($arResult['CATEGORIES'] as $arCategory) {?>
                        <div style="background-color: <?=$arCategory['PROPERTY_COLOR_VALUE']?>" class="tag g-bg fll"><?=$arCategory['NAME']?></div>
                    <?}?>

                    <div class="likes flr">
                        <span class="views fll"><?=$arResult['VIEWS']?></span>
                        <span class="comments fll"><?=$arParams['COMMENT_COUNT']?></span>
                    </div>
                </div>
            </div>
        </div>
        <?$this->SetViewTarget('facebook_share_image');
        echo "http://".$_SERVER['SERVER_NAME'].$arResult['DETAIL_PICTURE']['SRC'];
        $this->EndViewTarget();?>
        <div class="share">
            <span class="fll">Поделиться:</span>

            <div class="share-wrap fll">
                <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
                <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter" data-counter="" data-image="http://<?=$_SERVER['SERVER_NAME']?><?=$arResult['DETAIL_PICTURE']['SRC']?>"></div>
            </div>
            <div class="clr"></div>
        </div>

        <div class="txt">
            <?=$arResult['~DETAIL_TEXT']?>
            <div class="share">
                <span class="fll">Поделиться:</span>

                <div class="share-wrap fll">
                    <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
                    <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
                    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter" data-counter="" data-image="http://<?=$_SERVER['SERVER_NAME']?><?=$arResult['DETAIL_PICTURE']['SRC']?>"></div>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </div>
</div>