<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
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
global $APPLICATION;
?>
<? if (!empty($arResult['ITEMS'])) {
    $arCategories = $arResult['CATEGORIES'];?>
    <div class="item events">
        <div class="block">
			<h3><a href="/events/">
                    <span class="i i2"></span>
                    Ближайшие события
                </a>
            </h3>

            <div class="inner">
            <?foreach ($arResult['ITEMS'] as $arItem) {?>
                <div id="<?=BXHelper::getEditAreaId($this,$arItem);?>" class="event">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="img fll">
                        <div class="team-img-wrapper">
                            <img src="<?=$arItem['DATA']['ICON']?>" width="68" height="68" alt=""/>
                        </div>
                    </a>

                    <div class="inf">
                        <div class="ofl">
                            <strong style="color: <?=$arItem['DATA']['TEXT_COLOR']?>;" class="date fll">
                                <?=$arItem['DATA']['DATE']?>
                            </strong>

                            <div class="links fll">
                                <div class="views fll"><?=$arItem['VIEWS']?></div>
                                <div class="subscribers fll"><?=$arItem['COMMENTS']?></div>
                            </div>
                        </div>

                        <a <?=$arItem['TARGET']?> href="<?=$arItem['DETAIL_PAGE_URL']?>" class="name">
                            <?=$arItem['DATA']['NAME']?>
                        </a>

                        <a <?=$arItem['TARGET']?> href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn">Записаться</a>


                        <?/*foreach ($arItem['DATA']['CATEGORY_ID'] as $cat_id) {?>
                            <div class="tag fll" style="background-color: <?=$arCategories[$cat_id]['PROPERTY_COLOR_VALUE']?>"><?=$arCategories[$cat_id]['NAME']?></div>
                        <?}*/?>

                    </div>

                </div>
            <?}?>
            </div>
            <div class="clr"></div>
        </div>

<!--        <a href="/events/" class="calendar">-->
<!--            календарь-->
<!--            <br/>событий-->
<!--        </a>-->
    </div>
<?}?>