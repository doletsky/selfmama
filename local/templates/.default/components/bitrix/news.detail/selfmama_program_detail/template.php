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

    <div class="big-program">
        <div style="background-image: url('<?=$arResult['DETAIL_PICTURE']['SRC']?>');" class="top">
            <div class="over"></div>
            <div class="container">
                <h1><?=$arData['NAME']?></h1>

                <div class="date">
                    <span class="fw900"><?=$arData['DATE']?></span>
                    <?if (!empty($arData['TIME'])) {?>
                        <strong><?=$arData['TIME'];?></strong>
                    <?}?>
                </div>

                <div class="adr">
                    <span class="fw900"><?=$arData['ADDRESS']?></span>
                </div>

                <div class="price"><span class="fw900"><?=$arData['PRICE']?></span></div>

                <a href="#" class="btn event-button"><?=GetMessage('REGISTER_MESSAGE')?></a>
                <a href="#write-us" class="fancy btn no-bg c-yell">Задать вопрос</a>

                <?=$arData['TIMEPAD']?>
            </div>
        </div>

        <?$this->SetViewTarget('facebook_share_image');
        echo "http://".$_SERVER['SERVER_NAME'].$arResult['DETAIL_PICTURE']['SRC'];
        $this->EndViewTarget();?>
        <div class="bottom">
            <div class="container">
                <div class="item">
                    <div class="share">
                        <span>Поделиться:</span>

                        <div class="share-wrap">
                            <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
                            <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
                            <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter" data-counter="" data-image="http://<?=$_SERVER['SERVER_NAME']?><?=$arResult['DETAIL_PICTURE']['SRC']?>"></div>
                        </div>
                    </div>
                </div>

                <?=$arData['DESCRIPTION']?>

                <?if (!empty($arData["GALLERY"])) {?>
                    <div class="item no-top-border">
                        <div class="event-slider">
                            <div class="inner">
                                <ul>
                                    <?foreach ($arData["GALLERY"] as $arImage) {?>
                                        <li><a style="background-image: url('<?=$arImage['SRC']?>')" href="#"></a></li>
                                    <?}?>
                                </ul>
                            </div>

                            <div class="paginator paginator3"></div>
                        </div>
                    </div>
                <?}?>

                <?if (!empty($arData['MENTORS'])) {?>
                    <div class="item experts">
                        <h3>Экспертами и менторами в программе <?=$arData['NAME'];?> выступят:</h3>
                        <?foreach ($arData['MENTORS'] as $arMentor) {?>
                            <div class="block">
                                <div class="team-img-wrapper">
                                    <img src="<?=$arMentor['PHOTO']?>" width="60" height="60" alt="" class="fll"/>
                                </div>
                                <div class="inf">
                            <span class="fw900 name"><?=$arMentor['NAME']?></span>
                                    <?foreach ($arMentor['PROPERTIES']['PROFILES']['DESCRIPTION'] as $k => $value) {
                                        if (!empty($arMentor['PROPERTIES']['PROFILES']['VALUE'][$k])) {
                                            $link = $arMentor['PROPERTIES']['PROFILES']['VALUE'][$k];?>
                                        <?} else {
                                            $link = "#";
                                        }?>
                                        <a href="<?=$link?>" class="c-blue">
                                            <strong><?=$value?></strong>
                                        </a>
                                    <?}?>
                                    <p><?=$arMentor['PREVIEW_TEXT']?></p>
                                </div>

                            </div>
                        <?}?>
                    </div>
                <?}?>
                <?/*<div class="item experts">
                    <h3>Экспертами и менторами в программе InstaMakers выступят:</h3>
                    <div class="block">
                        <img src="images/ava60.jpg" width="60" height="60" alt="" class="fll"/>
                        <div class="inf">
                            <span class="fw900 name">
                                Марина Воронкова
                            </span>
                            <a href="#" class="c-blue">
                                <strong>@morday</strong>
                            </a>
                            <p>Создатель @azbuka.me, активная мама, инстаграмер;</p>
                        </div>

                    </div>
                    <div class="block">
                        <img src="images/ava60-2.jpg" width="60" height="60" alt="" class="fll"/>
                        <div class="inf">
                            <span class="fw900 name">

Ольга Самсонова
                            </span>
                            <a href="#" class="c-blue">
                                <strong>@olya_samsonova </strong>
                            </a>
                            <p>Создательница профиля @super.moms, мама, до декрета работала в трейд-маркетинге;</p>
                        </div>

                    </div>
                    <div class="block">
                        <img src="images/ava60.jpg" width="60" height="60" alt="" class="fll"/>
                        <div class="inf">
                            <span class="fw900 name">
Юлия Смольная
                            </span>
                            <a href="#" class="c-blue">
                                <strong>@juliasmolnaya</strong>
                            </a>
                            <p>Одна из самых популярных фитнес-мам Instagram, автор проекта «Я смогу»;</p>
                        </div>

                    </div>
                </div>*/?>

                <?=$arData['DESCRIPTION_BOTTOM']?>
            </div>
        </div>
    </div>