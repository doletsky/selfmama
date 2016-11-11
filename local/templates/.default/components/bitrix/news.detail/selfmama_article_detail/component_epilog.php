<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>

<?
$helper = SelfmamaHelper::getInstance();
$header_image = $helper->getHeaderImageByElement($arResult['ID']);
cDump(array($header_image, 'aazaz'));
CStorage::setVar($header_image, 'header_image_replace');
?>

<?CStorage::setVar($arResult['ID'], 'article_id');?>