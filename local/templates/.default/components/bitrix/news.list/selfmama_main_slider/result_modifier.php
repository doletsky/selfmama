<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>


<?
foreach ($arResult['ITEMS'] as &$arItem) {
    
    $link = $arItem['DISPLAY_PROPERTIES']['LINK']['VALUE'];

    if (!empty($arItem['DISPLAY_PROPERTIES']['SLIDE_TYPE_ALT']['VALUE'])) {

        if (!empty($link)) {
            $css_button_id = $arItem['RUNTIME_BUTTON_CSS_ID'] = $this->GetName()."_button_".$arItem['ID'];
            $css_block_id = $arItem['RUNTIME_BLOCK_CSS_ID'] = $this->GetName()."_block_".$arItem['ID'];

            $arItem['CONTENT'] = "<a href=\"".$link."\">\n";
            $arItem['CONTENT'] .= "<span id=\"".$arItem['RUNTIME_BLOCK_CSS_ID']."\" class=\"left-block\">\n
                            <span class=\"ins\">\n".$arItem['PREVIEW_TEXT'];
            $arItem['CONTENT'] .= "<span id=\"".$arItem['RUNTIME_BUTTON_CSS_ID']."\" class=\"btn\">Узнать больше</span>";
            $arItem['CONTENT'] .= "</span></span></a>\n";
        } else {
            $css_block_id = $arItem['RUNTIME_BLOCK_CSS_ID'] = $this->GetName()."_block_".$arItem['ID'];

            $arItem['CONTENT'] = "<a>\n";
            $arItem['CONTENT'] .= "<span id=\"".$arItem['RUNTIME_BLOCK_CSS_ID']."\" class=\"left-block\">\n
                            <span class=\"ins\">\n".$arItem['PREVIEW_TEXT'];
            $arItem['CONTENT'] .= "</span></span></a>\n";
        }

    } else {
        if (!empty($link)) {
            $arItem['CONTENT'] = "<a href=\"".$link."\"></a>";
        } else {
            $arItem['CONTENT'] = "<a></a>";
        }
    }
}?>

<?BXHelper::addCachedKeys($this->__component, array('ITEMS'), $arResult)?>