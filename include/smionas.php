<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?
global $APPLICATION;
global $azaz;
$azaz = 1;
$APPLICATION->IncludeComponent("bitrix:news.list", "selfmama_smionas_list",
    $arParams, false
);
$azaz = 0;
?>