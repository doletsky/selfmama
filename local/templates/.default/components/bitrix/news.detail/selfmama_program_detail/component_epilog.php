<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?$helper = SelfmamaHelper::getInstance();?>
<?
if (!empty($arResult['DATA']['BTN_COLOR'])) {
    $helper->setIdCss($arResult['RUNTIME_BUTTON_CSS_ID_1'],
        array(
            'background' => array(
                'value' => $arResult['DATA']['BTN_COLOR'],
                'important' => true
            )
        ));
    $helper->setIdCss($arResult['RUNTIME_BUTTON_CSS_ID_1'].":hover",
        array(
            'background' => array(
                'value' => "#fff",
                'important' => true
            )
        ));

    $helper->setIdCss($arResult['RUNTIME_BUTTON_CSS_ID_2'],
        array(
            'border-color' => array(
                'value' => $arResult['DATA']['BTN_COLOR'],
                'important' => true
            )
        ));
    $helper->setIdCss($arResult['RUNTIME_BUTTON_CSS_ID_2'].":hover",
        array(
            'border-color' => array(
                'value' => "#fff",
                'important' => true
            )
        ));
}

$header_image = $helper->getHeaderImageByElement($arResult['ID'], "UF_EVENT");
CStorage::setVar($header_image, 'hedaer_image_replace');
?>