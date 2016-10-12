<?php

$helper = SelfmamaHelper::getInstance();
foreach ($arResult['ITEMS'] as &$arItem) {
    $css_id = $arItem['RUNTIME_CSS_ID'];
    if (!empty($arItem['DISPLAY_PROPERTIES']['COLOR']['VALUE'])) {
        $rgb = $helper->hex2rgb($arItem['DISPLAY_PROPERTIES']['COLOR']['VALUE']);
        $rgb[] = PHOTO_HOVER_TRANSPARENCY;
        $rgb_value = "rgba(".implode(", ", $rgb).")";
        $helper->setIdCss($css_id,
            array(
                'background' => array(
                    'value' => $rgb_value,
                    'important' => true
                )
            ));
    }
}

if (empty($arResult['MORE_LINK'])) {
    CStorage::setVar(true, 'END_PAGE_PHOTO');
}