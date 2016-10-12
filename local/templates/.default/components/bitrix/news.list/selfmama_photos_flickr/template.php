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
<?if (!empty($arResult['ITEMS'])) {?>
    <div class="photo-gallery">
    <div class="container">
        <h1>
            <span class="i i4"></span>
            Фото
        </h1>
        <div id="photos" class="justified-gallery">
            <?if ($arParams['IS_AJAX']) $APPLICATION->RestartBuffer();?>
    <?foreach ($arResult['ITEMS'] as $arItem) {?>
        <a href="<?=$arItem['DETAIL_PICTURE']['SRC']?>" class="fancy jg-entry anim" >
            <img title="<?=$arItem['NAME']?>" src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" >
            <?if (!preg_match("/PHOTO_/",$arItem['NAME'])) {?>
                <div class="caption" ><span><?=$arItem['NAME']?></span></div>
            <?}?>
        </a>
    <?}?>
            <?
            if ($arParams['IS_AJAX']) echo $arResult['MORE_LINK'];
            ?>
            <?if ($arParams['IS_AJAX']) return true;?>
    </div>
        <?
        if (empty($arParams['IS_AJAX'])) echo $arResult['MORE_LINK'];
        ?>
    </div>
    </div>
<?}?>