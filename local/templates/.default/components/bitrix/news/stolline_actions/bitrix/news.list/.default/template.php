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
<?if (!empty($arResult["ITEMS"])) {?>
    <div class="news clearfix">
        <?foreach($arResult["ITEMS"] as $arItem) {
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>262, 'height'=>175), BX_RESIZE_IMAGE_EXACT, true);
            
            ?>
            <div id="<?=$this->GetEditAreaId($arItem['ID'])?>" class="main_news with_overlay">
                
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="big_link">
                    <?if ($file['src']) {?>
                        <div class="main_news_img">
                            <img src="<?=$file['src']?>">
                        </div>
                    <?}?>
                    <div class="main_news_text">
                        <small class="time"><?=$arItem['DISPLAY_ACTIVE_FROM']?></small>
                        <p class="title"><?=$arItem['NAME']?></p>
                        <p><?=$arItem['PREVIEW_TEXT']?></p>
                    </div>
                    <?if ($arItem["DISPLAY_PROPERTIES"]["IN_ESHOP"]["VALUE_ENUM_ID"]>0) {?>
                    <div class="tag tag_1"><?if ($arItem["DISPLAY_PROPERTIES"]["IN_ESHOP_LINK"]["VALUE"]) {?><a href="<?=$arItem["DISPLAY_PROPERTIES"]["IN_ESHOP_LINK"]["VALUE"];?>"><?}?>в интернет магазине<?if ($arItem["DISPLAY_PROPERTIES"]["IN_ESHOP_LINK"]["VALUE"]) {?></a><?}?></div>
                    <?}?>
                    <?if ($arItem["DISPLAY_PROPERTIES"]["IN_SHOP"]["VALUE_ENUM_ID"]>0) {?>
                    <div class="tag tag_2"><?if ($arItem["DISPLAY_PROPERTIES"]["IN_SHOP_LINK"]["VALUE"]) {?><a href="<?=$arItem["DISPLAY_PROPERTIES"]["IN_SHOP_LINK"]["VALUE"];?>"><?}?>в розничных магазинах<?if ($arItem["DISPLAY_PROPERTIES"]["IN_SHOP_LINK"]["VALUE"]) {?></a><?}?></div>
                    <?}?>
                </a>

            </div>
        <?}?>
    </div>
<?}?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]){?>
    <?=$arResult["NAV_STRING"]?>
<?}?>