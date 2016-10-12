<?
$arCatIds = array();
foreach ($arResult['ITEMS'] as $k => &$arItem) {

    if (!empty($arItem['DISPLAY_PROPERTIES']['REMOTE_LINK']['VALUE'])) {
        $arItem['DETAIL_PAGE_URL'] = $arItem['DISPLAY_PROPERTIES']['REMOTE_LINK']['VALUE'];
        $arItem['TARGET'] = "target=\"_blank\"";
    }

    if (tick($i)) $arItem['CLASS'] = "fll"; else $arItem['CLASS'] = "flr";
    foreach ($arItem['DISPLAY_PROPERTIES']['CATEGORY']['VALUE'] as $cat_id) {
        $arCatIds[] = $arItem['CAT_ID'] = $cat_id;
        cDump($arItem['CAT_ID']);
    }
    $arItem['VIEWS'] = $arItem['SHOW_COUNTER'] + $arItem['DISPLAY_PROPERTIES']['VIEW_MODIFY']['VALUE'];
    $arItem['COMMENTS'] = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 10, 'ACTIVE' => 'Y', 'PROPERTY_LINKED' =>  $arItem['ID']), array());
}
$categories = BXHelper::getElements(array(), array('ID' => $arCatIds), false, false, array('PROPERTY_COLOR', 'NAME','ID'), true, 'ID');
$categories = $categories['RESULT'];


$arResult['CATEGORIES'] = $categories;



BXHelper::addCachedKeys($this->__component, array(
    'CATEGORIES',
), $arResult);
?>