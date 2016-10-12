<?
$helper = SelfMamaHelper::getInstance();
$arCatIds = array();
foreach ($arResult['ITEMS'] as $k => &$arItem) {

    if (!empty($arItem['DISPLAY_PROPERTIES']['NOT_DISPLAY_DAY']['VALUE'])) {
        $mformat = 'f';
        $display_day = false;
    } else {
        $mformat = 'F';
        $display_day = true;
    }

    $arItem['VIEWS'] = $arItem['SHOW_COUNTER'] + $arItem['DISPLAY_PROPERTIES']['VIEW_MODIFY']['VALUE'];
    $arItem['DISPLAY_DATE'] = BXHelper::getPeriodDisplayDate(
        strtotime($arItem['DISPLAY_PROPERTIES']['START_DATETIME']['VALUE']),
        strtotime($arItem['DISPLAY_PROPERTIES']['END_DATETIME']['VALUE']),
        "F",
        $mformat,
        true,
        $display_day
    );

    $arItem['COMMENTS'] = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 10, 'ACTIVE' => 'Y', 'PROPERTY_LINKED' =>  $arItem['ID']), array());

    $arItem['EVENT_TIMEPAD_INFO'] = $helper->getEventInfoByScript($arItem['DISPLAY_PROPERTIES']['TIMEPAD']['~VALUE']);

    $arItem['DISPLAY_PRICE'] = $arResult['DISPLAY_PROPERTIES']['PRICE']['VALUE'];


    $start_time = strtotime($arItem['ACTIVE_FROM']);

    if (!empty($arItem['DISPLAY_PROPERTIES']['REMOTE_LINK']['VALUE'])) {
        $arItem['DETAIL_PAGE_URL'] = $arItem['DISPLAY_PROPERTIES']['REMOTE_LINK']['VALUE'];
        $arItem['TARGET'] = "target=\"_blank\"";
    } else {
        $arItem['DETAIL_PAGE_URL'] = $arParams['SEF_FOLDER'].date("Y", $start_time)."/".$arItem['CODE'];
    }
}

?>