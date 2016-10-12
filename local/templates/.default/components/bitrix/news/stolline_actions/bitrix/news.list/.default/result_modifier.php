<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?foreach ($arResult['ITEMS'] as &$arItem) {
    $arItem['DETAIL_PICTURE']['RESIZE_SRC'] = BXHelper::getResizedPictureByID($arItem['DETAIL_PICTURE']['ID'], array('width' => $arParams['IMAGE_WIDTH'], 'height' => $arParams['IMAGE_HEIGHT']), BX_RESIZE_IMAGE_EXACT);
}?>