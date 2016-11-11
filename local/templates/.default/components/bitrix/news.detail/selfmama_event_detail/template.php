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
<?if (empty($arResult['DATA'])) {
    BXHelper::NotFound();
    return false;
} else {
    $arData = $arResult['DATA'];
}?>
<div class="center" data-target="122">

    <div class="big-event">

        <div class="top">
            <strong class="c-blue date"><?=$arData['DATE']?></strong>

            <h1><?=$arData['NAME']?></h1>
        </div>


        <div class="container">

            <div class="right-part flr">
                <div class="item description">
                    <div class="block">
                        <div class="g-bg" <?if (!empty($arData['RIGHT_BLOCK_COLOR'])) {?>style="background-color: <?=$arData['RIGHT_BLOCK_COLOR']?>"<?}?>>
                            <h3 class="date">
                                <?=$arData['DATE']?>
                            </h3>

                            <h3 class="adr">
                                <?=$arData['PLACE']?>
                            </h3>
                            <p><?=$arData['ADDRESS']?></p>

                            <a href="#reg-me" class="event-button btn fancy" <?if (!empty($arResult['RUNTIME_BUTTON_CSS_ID_1'])) {?>id="<?=$arResult['RUNTIME_BUTTON_CSS_ID_1']?>" <?}?>>
                                <?=GetMessage('REGISTER_MESSAGE')?>
                            </a>

                            <a href="#write-us" class="btn fancy no-bg" <?if (!empty($arResult['RUNTIME_BUTTON_CSS_ID_2'])) {?>id="<?=$arResult['RUNTIME_BUTTON_CSS_ID_2']?>" <?}?>>Задать вопрос</a>

                            <?=$arData['TIMEPAD']?>

                        </div>
                    </div>
                </div>

            </div>
            <div class="left-part">

                <div class="big-article">
                    <div class="item">

                        <div style="background-image: url('<?=$arResult['DETAIL_PICTURE']['SRC']?>');" class="img">
                            <div class="overlay"></div>
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
                            <?=$arData['DESCRIPTION_SHORT']?>
                        </div>


                    </div>

                    <?=$arData['DESCRIPTION']?>

                    <?if (!empty($arData['GALLERY'])) {?>
                        <div class="item">
                            <div class="event-slider">
                                <div class="inner">
                                    <ul>
                                        <?foreach ($arData['GALLERY'] as $arImage) {?>
                                            <li><a class="gallery-img fancybox" href="<?=$arImage['SRC']?>" style="background-image: url('<?=$arImage['THUMB']?>')" ></a></li>
                                        <?}?>
                                    </ul>
                                </div>

                                <div class="paginator paginator3"></div>
                            </div>
                        </div>
                    <?}?>


                    <div class="item double">
                        <div class="block50">
                            <div class="ins">
                                <h3>
                                    Дата и место
                                </h3>
                                    <span class="fw900">
                                        <?=$arData['DATE']?> <?=!empty($arData['PLACE']) ? ", ".$arData['PLACE']:""?>
                                    </span>
                                <p><?=$arData['ADDRESS']?></p>

                                <?if (!empty($arData['MAP'])) {?>
                                    <a href="<?=$arData['MAP']?>" target="_blank" class="c-blue"><strong>Схема проезда</strong></a>
                                <?}?>

                            </div>
                        </div>

                        <?if (!empty($arData['CONTACTS'])) {?>
                            <div class="block50">
                                <div class="ins">
                                    <h3>Контакты</h3>

                                    <?foreach ($arData['CONTACTS'] as $arContact) {?>
                                        <div class="items">
                                            <div class="ava fll">
                                                <div class="team-img-wrapper">
                                                    <img src="<?=$arContact['PHOTO']?>" width="60" height="60" alt=""/>
                                                </div>
                                            </div>

                                            <div class="inf">
                                                <span class="fw900"><?=$arContact['NAME']?></span>
                                                <a href="mailto:<?=$arContact['EMAIL']?>" class="c-blue"><strong><?=$arContact['EMAIL']?></strong></a>

                                                <p><?=$arContact['PHONE']?></p>
                                            </div>
                                        </div>
                                    <?}?>
                                </div>
                            </div>
                        <?}?>

                    </div>

                    <div class="item last">

                        <?=$arData['DESCRIPTION_BOTTOM']?>

                        <div class="share">
                            <span class="fll">Поделиться:</span>

                            <div class="share-wrap fll">
                                <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
                                <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
                                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter" data-counter=""></div>
                            </div>
                            <div class="clr"></div>
                        </div>

                    </div>

                </div>

                <?=$arParams['~COMMENTS_HTML']?>
            </div>



        </div>
        <div class="clr"></div>
    </div>
</div>