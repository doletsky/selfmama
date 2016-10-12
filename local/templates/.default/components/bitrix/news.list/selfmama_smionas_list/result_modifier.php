<?
$arCatIds = array();

foreach ($arResult['ITEMS'] as $k => &$arItem) {

    if (!$k && !$arParams['IS_AJAX'])  {
        $arItem['CLASS']  = "big";
    }else {
        if (tick($i)) $arItem['CLASS'] = "fll"; else $arItem['CLASS'] = "flr";
    }
    foreach ($arItem['DISPLAY_PROPERTIES']['CATEGORY']['VALUE'] as $cat_id) {
        $arCatIds[] = $arItem['CAT_ID'] = $cat_id;
    }
    $arItem['VIEWS'] = $arItem['SHOW_COUNTER'] + $arItem['DISPLAY_PROPERTIES']['VIEW_MODIFY']['VALUE'];
}
$categories = BXHelper::getElements(array(), array('ID' => $arCatIds), false, false, array('PROPERTY_COLOR', 'NAME','ID'), true, 'ID');
$categories = $categories['RESULT'];

$arResult['CATEGORIES'] = $categories;

if (intval($arParams['START_PAGE'])) {
    $arResult['START_PAGE_MORE'] = $arParams['START_PAGE'];
} else {
    $arResult['START_PAGE_MORE'] = $arResult['NAV_RESULT']->NavPageNomer;
}

$arResult['END_PAGE_MORE'] = $arResult['NAV_RESULT']->NavPageNomer+1;
$arResult['NAVI'] = get_object_vars($arResult['NAV_RESULT']);
$arResult['FULL_COUNT'] = $arParams['LAST_COUNT']+count($arResult['ITEMS']);

BXHelper::addCachedKeys($this->__component, array(
    'CATEGORIES',
    'NAV_STRING',
    'START_PAGE_MORE',
    'END_PAGE_MORE',
    'NAVI',
    'FULL_COUNT'
), $arResult);
?>