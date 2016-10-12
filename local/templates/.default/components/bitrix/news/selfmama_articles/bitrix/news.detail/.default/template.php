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
<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
<small class="time"><?=mb_strtolower(formatDate("d F Y",strtotime($arResult["ACTIVE_FROM"])));?></small>
<?endif;?>
<section class="new-item-content clearfix">
    <?
    $file = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width'=>616, 'height'=>9999), BX_RESIZE_IMAGE_PROPORTIONAL, true);    
    if($arParams["DISPLAY_PICTURE"]!="N" && $file["src"]) {
        ?>
        <div class="news-item-img">
            <img
                src="<?=$file["src"];?>"
                alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
                />
        </div>
    <?}?>
    <div class="news-item-text">
        <?echo $arResult["DETAIL_TEXT"];?>
    </div>
</section>