<?
foreach ($arResult['ITEMS'] as $arItem) {
    foreach ($arItem['DISPLAY_PROPERTIES']['CATEGORY']['VALUE'] as $cat_id) {
        $arCatIds[] = $cat_id;
    }
}

$helper = SelfMamaHelper::getInstance();

if (!empty($arCatIds)) {
    $categories = BXHelper::getElements(array(), array('ID' => $arCatIds), false, false, array('PROPERTY_COLOR', 'NAME','ID'), true, 'ID');
    $categories = $categories['RESULT'];

    $arResult['CATEGORIES'] = $categories;

    $cat = current($arResult['CATEGORIES']);

    $right_block_color = $cat['PROPERTY_COLOR_VALUE'];
}

foreach ($arResult['ITEMS'] as &$arEventItem) {
    //$arEventItem['']

    if (!empty($arEventItem['DISPLAY_PROPERTIES']['NOT_DISPLAY_DAY']['VALUE'])) {
        $mformat = 'f';
        $display_day = false;
    } else {
        $mformat = 'F';
        $display_day = true;
    }


    $start_time = strtotime($arEventItem['DISPLAY_PROPERTIES']['START_DATETIME']['VALUE']);

    if (!empty($arEventItem['DISPLAY_PROPERTIES']['REMOTE_LINK']['VALUE'])) {
        $arEventItem['DETAIL_PAGE_URL'] = $arEventItem['DISPLAY_PROPERTIES']['REMOTE_LINK']['VALUE'];
        $arEventItem['TARGET'] = "target=\"_blank\"";
    } else {
        $arEventItem['DETAIL_PAGE_URL'] = "/events/".date("Y", $start_time)."/".$arEventItem['CODE']."/";
    }


    $arEventItem['COMMENTS'] = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 10, 'ACTIVE' => 'Y', 'PROPERTY_LINKED' =>  $arEventItem['ID']), array());
    $arEventItem['VIEWS'] = $arEventItem['SHOW_COUNTER'] + $arEventItem['DISPLAY_PROPERTIES']['VIEW_MODIFY']['VALUE'];
    $arEventItem['EVENT_TIMEPAD_INFO'] = $helper->getEventInfoByScript($arEventItem['DISPLAY_PROPERTIES']['TIMEPAD']['~VALUE']);

    cDump(array(BXHelper::getPeriodDisplayDate(
        $start_time,
        strtotime($arEventItem['DISPLAY_PROPERTIES']['END_DATETIME']['VALUE']),
        $mformat,
        true,
        $display_day
    ), $arEventItem));

    $arEventItem['DATA'] = array(
        //скрипт timepad
        'TIMEPAD' => $arEventItem['DISPLAY_PROPERTIES']['TIMEPAD']['~VALUE'],

        //отрисовка даты с учетом периода

        'DATE' => BXHelper::getPeriodDisplayDate(
            $start_time,
            strtotime($arEventItem['DISPLAY_PROPERTIES']['END_DATETIME']['VALUE']),
            $mformat,
            true,
            $display_day
        ),

        'NAME' => $arEventItem['NAME'],
        'HREF' => "/events/".date("Y", $start_time)."/".$arEventItem['CODE']."/",
        'ICON' => BXHelper::getResizedPictureToSquare(
            $arEventItem['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['ID'], 100
        ),
        'CATEGORY_ID' => $arEventItem['DISPLAY_PROPERTIES']['CATEGORY']['VALUE'],
        'TEXT_COLOR' => $arEventItem['DISPLAY_PROPERTIES']['LIST_COLOR']['VALUE']
    );
}


BXHelper::addCachedKeys($this->__component, array(
    'CATEGORIES',
    'DATA',
    'VIEWS',
    'EVENT_TIMEPAD_INFO'
), $arResult);
?>