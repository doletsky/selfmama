<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?
unset($arParams['component']);
$APPLICATION->IncludeComponent("bitrix:news.list", "selfmama_articles_list",
    $arParams, $component
);
?>