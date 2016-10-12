<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?
$arDivisionContacts = array();
$arDivisions = array();
foreach ($arResult['ITEMS'] as &$arItem) {
    $arItem['DETAIL_PICTURE']['SRC'] = BXHelper::getResizedPictureToSquare($arItem['DETAIL_PICTURE']['ID']);
    $division_value_id = $arItem['DISPLAY_PROPERTIES']['DIVISION']['VALUE'];
    $arDivisionContacts[$division_value_id][] = $arItem;
    if (empty($arDivisions[$division_value_id])) {
        $arDivisions[$division_value_id] = $arItem['DISPLAY_PROPERTIES']['DIVISION']['DISPLAY_VALUE'];
    }
}

$arResult['ITEMS_BY_DIVISION'] = $arDivisionContacts;
$arResult['DIVISIONS'] = $arDivisions;

BXHelper::addCachedKeys($this->__component, array('ITEMS_BY_DIVISION','DIVISIONS'), $arResult);
?>