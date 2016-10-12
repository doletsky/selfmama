<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?
global $APPLICATION;
$page = !empty($_REQUEST['page']) ? $_REQUEST['page']:0;

$helper = SelfmamaHelper::getInstance();



$page_num = 0;
if ($page == 0) {
    $photos = $helper->getNonFlickrPhotos(7, array('UF_ACTIVE' => 1), array('UF_SORT' => 'ASC', 'ID' => 'DESC'));
    $page_num = 2;
} else {
    if ($page == 1) {
        $page = 0;
    }
    $photos = $helper->getFlickrPhotos(7, $page, $page_num);
}
$page++;
$photos['GROUPS'] = array_chunk_complex($photos, 2,3);

if (Phery::is_ajax() && $_REQUEST['phery']['remote'] == 'more') {
    $APPLICATION->RestartBuffer();
    Phery::instance()->set(
        array(
            'more' =>  function($ajax_data) use($photos, $page_num){
                global $APPLICATION;
                global $NavNum;
                if (!empty($ajax_data['page'])) {
                    $id = "#photos";
                    ob_start();
                    $APPLICATION->IncludeFile("/include/flicker_photos_template.php", array('photos' => $photos, 'page' => $ajax_data['page']+1, 'page_num'=> $page_num , 'is_ajax' => true));
                    $html = ob_get_clean();
                    $response = PheryResponse::factory($id);
//                    $response = $response->jquery("#pagination_".$ajax_data['pagen']."_".$ajax_data['page'])->remove();
                    return $response->jquery(".see-more")->remove()->jquery('#photos')->append($html);
                }

            }
        )
    )->process();
}

$APPLICATION->IncludeFile("/include/flicker_photos_template.php", array('photos' => $photos, 'page' => $page,'is_ajax' => false, 'page_num'=> $page_num));
?>