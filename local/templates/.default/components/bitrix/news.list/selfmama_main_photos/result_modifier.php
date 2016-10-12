
<?
foreach ($arResult['ITEMS'] as &$arItem) {
    $css_id = $arItem['RUNTIME_CSS_ID'] = $this->GetName().$arItem['ID'];
}
$arResult['GROUPS'] = array_chunk($arResult['ITEMS'], 6);
BXHelper::addCachedKeys($this->__component, array('GROUPS', 'ITEMS'), $arResult);
?>