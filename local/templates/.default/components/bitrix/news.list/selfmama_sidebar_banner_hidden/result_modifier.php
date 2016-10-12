<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>


<?
foreach ($arResult['ITEMS'] as &$arItem) {

    $arItem['RUNTIME_BUTTON_CSS_ID'] = $this->GetName()."_button_".$arItem['ID'];

}?>

<?BXHelper::addCachedKeys($this->__component, array('ITEMS'), $arResult)?>