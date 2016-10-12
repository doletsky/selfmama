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
    <div class="item hide-events events">
        <div class="block">
			<h3><a href="/events/">
                    <span class="i i2"></span>
                    Ближайшие события
                </a>
            </h3>

            <?foreach ($arResult['ITEMS'] as $arItem) {?>
                <div id="<?=BXHelper::getEditAreaId($this,$arItem);?>" class="event">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="img fll">
                        <div class="team-img-wrapper">
                            <img src="<?=$arItem['DATA']['ICON']?>" width="68" height="68" alt=""/>
                        </div>
                    </a>

                    <div class="inf">
                        <strong style="color: <?=$arItem['DATA']['TEXT_COLOR']?>;" class="date">
                            <?=$arItem['DATA']['DATE']?>
                        </strong>

                        <a <?=$arItem['TARGET']?> href="<?=$arItem['DETAIL_PAGE_URL']?>" class="name">
                            <?=$arItem['DATA']['NAME']?>
                        </a>

                        <div class="links">
                            <div class="views fll"><?=$arItem['VIEWS']?></div>
                            <div class="subscribers fll"><?=$arItem['COMMENTS']?></div>
                        </div>

                    </div>

                </div>
            <?}?>
            <div class="clr"></div>
        </div>

        <a href="/events/" class="calendar">
            календарь
            <br/>событий
        </a>
    </div>
<?}?>