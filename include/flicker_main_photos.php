<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?
global $APPLICATION;

$helper = SelfmamaHelper::getInstance();

$non_flicker_photos = $helper->getNonFlickrPhotos(6, array('UF_ACTIVE' => 1), array('UF_SORT' => 'ASC', 'ID' => 'DESC'));
$photos = $helper->getFlickrPhotos(24);

$photos = array_merge($non_flicker_photos, $photos);

$photos['GROUPS'] = array_chunk($photos, 6);

$APPLICATION->IncludeFile(
    "/include/flicker_main_photos_template.php",
    array(
        'photos' => $photos,
        'main_page' => MAIN_PAGE,
        'sef_folder' => "/photos/",
        'border_color' => BXHelper::getHighloadValue("TemplateData", array('UF_CODE' => 'main_photo_border'))
    )
);
?>