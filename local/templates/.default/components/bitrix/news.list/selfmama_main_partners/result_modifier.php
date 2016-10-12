<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>

<?foreach ($arResult['ITEMS'] as &$arItem) {
    $arItem['PREVIEW_PICTURE']['SRC'] =
        BXHelper::getResizedPictureByName($arItem['PREVIEW_PICTURE']['SRC'], array('width' => 200, 'height' => 200), BX_RESIZE_IMAGE_PROPORTIONAL);
}?>