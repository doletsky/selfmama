<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?
foreach ($arResult['DISPLAY_PROPERTIES']['CATEGORY']['VALUE'] as $cat_id) {
    $arCatIds[] = $cat_id;
}
if (!empty($arCatIds)) {
    $categories = BXHelper::getElements(array(), array('ID' => $arCatIds), false, false, array('PROPERTY_COLOR', 'NAME','ID'), true, 'ID');
    $categories = $categories['RESULT'];

    $arResult['CATEGORIES'] = $categories;
}


$arResult['VIEWS'] = $arResult['SHOW_COUNTER'] + $arResult['DISPLAY_PROPERTIES']['VIEW_MODIFY']['VALUE'];

BXHelper::addCachedKeys($this->__component, array(
    'CATEGORIES','ID'
), $arResult);
?>
