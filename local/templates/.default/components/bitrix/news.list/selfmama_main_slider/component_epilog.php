<?$helper = SelfmamaHelper::getInstance();?>

<?
foreach ($arResult['ITEMS'] as &$arItem) {


    if (!empty($arItem['DISPLAY_PROPERTIES']['SLIDE_TYPE_ALT']['VALUE'])) {

        $css_button_id = $arItem['RUNTIME_BUTTON_CSS_ID'];
        $css_block_id = $arItem['RUNTIME_BLOCK_CSS_ID'];

        if (!empty($arItem['DISPLAY_PROPERTIES']['BUTTON_COLOR']['VALUE'])) {
            $color = $arItem['DISPLAY_PROPERTIES']['BUTTON_COLOR']['VALUE'];
            $helper->setIdCss($css_button_id,
                array(
                    'background' => array(
                        'value' => $color,
                        'important' => true
                    )
                ));
        }

        if (!empty($arItem['DISPLAY_PROPERTIES']['BUTTON_COLOR_2']['VALUE'])) {
            $color = $arItem['DISPLAY_PROPERTIES']['BUTTON_COLOR_2']['VALUE'];
            $helper->setIdCss($css_button_id . ":hover",
                array(
                    'background' => array(
                        'value' => $color,
                        'important' => true
                    )
                ));
        }

        if (!empty($arItem['DISPLAY_PROPERTIES']['HOVER_COLOR']['VALUE'])) {
            $rgb = $helper->hex2rgb($arItem['DISPLAY_PROPERTIES']['HOVER_COLOR']['VALUE']);
            $rgb[] = SLIDER_HOVER_TRANSPARENCY;
            $rgb_value = "rgba(" . implode(", ", $rgb) . ")";
            $helper->setIdCss($css_block_id,
                array(
                    'background' => array(
                        'value' => $rgb_value,
                        'important' => true
                    )
                ));
        }
    }
}?>