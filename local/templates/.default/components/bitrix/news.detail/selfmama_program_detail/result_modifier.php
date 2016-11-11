<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?
foreach ($arResult['DISPLAY_PROPERTIES']['CATEGORY']['VALUE'] as $cat_id) {
    $arCatIds[] = $cat_id;
}

if (count($arResult['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE']) == 1) {
    $arResult['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE'] = array($arResult['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE']);
}


if (!empty($arResult['DISPLAY_PROPERTIES']['NOT_DISPLAY_DAY']['VALUE'])) {
    $mformat = 'f';
    $display_day = false;
} else {
    $mformat = 'F';
    $display_day = true;
}


foreach ($arResult['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE'] as &$file) {
    $file['THUMB'] = BXHelper::getResizedPictureByID($file['ID'], array('width' => 756, 'height' => 300), BX_RESIZE_IMAGE_PROPORTIONAL);
}

$helper = SelfMamaHelper::getInstance();

if (!empty($arCatIds)) {
    $categories = BXHelper::getElements(array(), array('ID' => $arCatIds), false, false, array('PROPERTY_COLOR', 'NAME','ID'), true, 'ID');
    $categories = $categories['RESULT'];

    $arResult['CATEGORIES'] = $categories;

    $cat = current($arResult['CATEGORIES']);

    $right_block_color = $cat['PROPERTY_COLOR_VALUE'];
}

$arResult['VIEWS'] = $arResult['SHOW_COUNTER'] + $arResult['DISPLAY_PROPERTIES']['VIEW_MODIFY']['VALUE'];

$arResult['EVENT_TIMEPAD_INFO'] = $helper->getEventInfoByScript($arResult['DISPLAY_PROPERTIES']['TIMEPAD']['~VALUE']);

$tstamp_from = strtotime($arResult['DISPLAY_PROPERTIES']['START_DATETIME']['VALUE']);
$tstamp_to = strtotime($arResult['DISPLAY_PROPERTIES']['END_DATETIME']['VALUE']);

$arResult['DATA'] = array(
    //скрипт timepad
    'TIMEPAD' => $arResult['DISPLAY_PROPERTIES']['TIMEPAD']['~VALUE'],

    //отрисовка даты с учетом периода
    'DATE' => BXHelper::getPeriodDisplayDate(
        $tstamp_from, $tstamp_to,
        $mformat,
        false,
        $display_day
    ),

    'PRICE' => $arResult['DISPLAY_PROPERTIES']['PRICE']['VALUE']/* $helper->getEventDisplayPrice($arResult)*/,
    'NAME' => $arResult['NAME']/*$helper->getEventDisplayName($arResult)*/,
    'ADDRESS' => $helper->getEventDisplayAddress($arResult),

    //блок описания
    'DESCRIPTION' => $helper->getProgramDisplayDescription($arResult),
    //блок описания сразу под картинкой
    'DESCRIPTION_SHORT' => $helper->getEventDisplayDescriptionShort($arResult),
    //описание под контактами
    'DESCRIPTION_BOTTOM' => $helper->getProgramDisplayDescriptionBottom($arResult),
    'PLACE' => $arResult['DISPLAY_PROPERTIES']['PLACE']['VALUE'],
    'GALLERY' => $arResult['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE'],
    //контакты
    'BTN_COLOR' => $arResult['DISPLAY_PROPERTIES']['BTN_COLOR']['VALUE'],
    'RIGHT_BLOCK_COLOR' => $right_block_color,
    'MENTORS' => $helper->getProgramDisplayMentors($arResult),
);

cDump($arResult['DATA']);


$arResult['DATA']['TIME'] = BXHelper::getPeriodDisplayTime($tstamp_from, $tstamp_to);

if (!$tstamp_to && $arResult['DATA']['TIME'] != '00:00') {
    $arResult['DATA']['TIME'] = "Начало в ".$arResult['DATA']['TIME'];
} else {
    $arResult['DATA']['TIME'] = "";
}

if (!empty($arResult['DATA']['BTN_COLOR'])) {
    $arResult['RUNTIME_BUTTON_CSS_ID_1'] = $this->GetName()."_button_1_".$arResult['ID'];
    $arResult['RUNTIME_BUTTON_CSS_ID_2'] = $this->GetName()."_button_2_".$arResult['ID'];
}

BXHelper::addCachedKeys($this->__component, array(
    'CATEGORIES','ID','VIEWS', 'DATA', 'EVENT_TIMEPAD_INFO', 'RUNTIME_BUTTON_CSS_ID_1', 'RUNTIME_BUTTON_CSS_ID_2'
), $arResult);
?>
