<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?
unset($arParams['component']);
$APPLICATION->IncludeComponent("bitrix:news.list", "selfmama_events_list",
    $arParams, $component
);
?>