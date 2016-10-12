<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$config = new FlickerConfig('FLICKER_ID','FLICKER_FLAG');
$uploader = new FlickerUploader(8,false, $config);
$uploader->sync();
?>