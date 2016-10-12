<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();

use  League\Uri\UriParser;
$parse = new UriParser();
foreach ($arResult['ITEMS'] as &$arItem) {
    $arItem['LINK'] = $arItem['DISPLAY_PROPERTIES']['LINK']['VALUE'];
    $parsed_uri = $parse->parse($arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']);
    if (strpos($parsed_uri['host'], "vimeo") !== false) {
        $path = explode("/", $parsed_uri['path']);
        $arItem['VIDEO_ID'] = $path[2];
        $arItem['SERVICE'] = "vimeo";
    } else if (strpos($parsed_uri['host'], "youtube") !== false) {
        $path = explode("/", $parsed_uri['path']);
        $arItem['VIDEO_ID'] = $path[2];
        $arItem['SERVICE'] = "youtube";
    }
    $arItem['THUMB'] = getThumb($arItem);
    cDump($arItem['THUMB']);
}


function getThumb($arItem) {
    if (!empty($arItem['PREVIEW_PICTURE']['SRC'])) {
        return $arItem['PREVIEW_PICTURE']['SRC'];
    } else {
        switch ($arItem['SERVICE']) {
            case "youtube":
                return "http://img.youtube.com/vi/".$arItem['VIDEO_ID']."/0.jpg";
            case "vimeo":
                $data = file_get_contents("http://vimeo.com/api/v2/video/".$arItem['VIDEO_ID'].".json");
                $data = json_decode($data, true);
                return $data[0]['thumbnail_large'];
        }
    }
    return false;

}
?>