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
        $mformat,
        true,
        $display_day
    );

    $arItem['DISPLAY_PRICE'] = $helper->getEventDisplayPrice($arItem);
}

$arResult[strtoupper($arParams['MODE'])."_CLASS"] = "active";

$latest_year_element_end = BXHelper::getElements(array('PROPERTY_END_DATETIME' => 'DESC'), array('IBLOCK_ID' => $arParams['IBLOCK_ID']), false, array('nTopCount' => 1), array('ID', 'PROPERTY_END_DATETIME','PROPERTY_START_DATETIME'));
$latest_year_element_start = BXHelper::getElements(array('PROPERTY_START_DATETIME' => 'DESC'), array('IBLOCK_ID' => $arParams['IBLOCK_ID']), false, array('nTopCount' => 1), array('ID', 'PROPERTY_START_DATETIME'));
$latest_year_element_end = $latest_year_element_end['RESULT'][0];
$latest_year_element_start = $latest_year_element_start['RESULT'][0];
if (!empty($latest_year_element_end['PROPERTY_END_DATETIME_VALUE'])) {
    $lYearEnd = date("Y", strtotime($latest_year_element_end['PROPERTY_END_DATETIME_VALUE']));
    $lYearStart = date("Y", strtotime($latest_year_element_start['PROPERTY_START_DATETIME_VALUE']));

    $latest_year = $lYearEnd >= $lYearStart ? $lYearEnd : $lYearEnd;
} else {
    $latest_year = date("Y", strtotime($latest_year_element_start['PROPERTY_START_DATETIME_VALUE']));
}


$earliest_year_element_start = BXHelper::getElements(array('PROPERTY_START_DATETIME' => 'ASC'), array('IBLOCK_ID' => $arParams['IBLOCK_ID'], '!PROPERTY_START_DATETIME' => false), false, array('nTopCount' => 1), array('ID', 'PROPERTY_START_DATETIME'));
$earliest_year_element_start = $earliest_year_element_start['RESULT'][0];
$earliest_year = date("Y", strtotime($earliest_year_element_start['PROPERTY_START_DATETIME_VALUE']));

$mode_part = !empty($arParams['MODE']) ? $arParams['MODE']."/" : "";

if ($arParams['YEAR'] < $latest_year) {
    $next_year = intval($arParams['YEAR'])+1;
    $arResult['NEXT_LINK'] = "<a href=\"".$arParams['ROOT_FOLDER'].$next_year."/".$mode_part."\" class=\"arrs next\">".$next_year."</a>";
}

if ($arParams['YEAR'] > $earliest_year) {
    $prev_year = intval($arParams['YEAR'])-1;
    $arResult['PREV_LINK'] = "<a href=\"".$arParams['ROOT_FOLDER'].$prev_year."/".$mode_part."\" class=\"arrs prev\">".$prev_year."</a>";
}



//if (intval($arParams['START_PAGE'])) {
//    $arResult['START_PAGE_MORE'] = $arParams['START_PAGE'];
//} else {
//    $arResult['START_PAGE_MORE'] = $arResult['NAV_RESULT']->NavPageNomer;
//}

//$arResult['END_PAGE_MORE'] = $arResult['NAV_RESULT']->NavPageNomer+1;
//$arResult['NAVI'] = get_object_vars($arResult['NAV_RESULT']);
//$arResult['FULL_COUNT'] = $arParams['LAST_COUNT']+count($arResult['ITEMS']);

//BXHelper::addCachedKeys($this->__component, array(
//), $arResult);
?>