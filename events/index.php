<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Календарь событий - Проекта \"Selfmama\"");
$APPLICATION->SetTitle("Мероприятия ");
$APPLICATION->SetPageProperty("HEADER_CLASS", "inner-page");
?>
<?
global $_REQUEST;
if (!empty($_REQUEST['YEAR'])) {
$sef_folder = !empty($_REQUEST['MODE']) ? "/events/".$_REQUEST['YEAR']."/".$_REQUEST['MODE']."/":"/events/".$_REQUEST['YEAR']."/";
} else {
$_REQUEST['YEAR'] = intval(date("Y"));
$sef_folder = "/events/".$_REQUEST['YEAR']."/";
}

?>
<?$APPLICATION->IncludeComponent(
    "bitrix:news",
    "selfmama_events",
    Array(
        "ADD_ELEMENT_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "BROWSER_TITLE" => "-",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "COMPONENT_TEMPLATE" => "selfmama_events",
        "DETAIL_ACTIVE_DATE_FORMAT" => "d F Y",
        "DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
        "DETAIL_DISPLAY_TOP_PAGER" => "N",
        "DETAIL_FIELD_CODE" => array("DETAIL_PICTURE","DETAIL_TEXT"),
        "DETAIL_PAGER_SHOW_ALL" => "Y",
        "DETAIL_PAGER_TEMPLATE" => "",
        "DETAIL_PAGER_TITLE" => "Страница",
        "DETAIL_PROPERTY_CODE" => array(
            "CATEGORY",
            "VIEW_MODIFY",
            "PRICE",
            "START_DATETIME",
            "END_DATETIME",
            "TIMEPAD",
            "BLOCKS",
            "GALLERY",
            "MAP_SCRIPT",
            "CONTACTS",
            "BLOCKS_BOT",
            "PLACE",
            "ADDRESS",
            "BTN_COLOR",
            "MAPLINK",
            "REMOTE_LINK",
            "MENTORS",
            "NOT_DISPLAY_DAY"
        ),
        "DETAIL_SET_CANONICAL_URL" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "14",
        "IBLOCK_TYPE" => "actions",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "LIST_ACTIVE_DATE_FORMAT" => "d F Y",
        "LIST_FIELD_CODE" => array("PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_PICTURE","DETAIL_TEXT"),
        "LIST_PROPERTY_CODE" => array(
            "VIEW_MODIFY",
            "PRICE",
            "LIST_COLOR",
            "START_DATETIME",
            "END_DATETIME",
            "REMOTE_LINK",
            "NOT_DISPLAY_DAY"
        ),
        "MESSAGE_404" => "",
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "NEWS_COUNT" => "6",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "selfmama",
        "PAGER_TITLE" => "Новости",
        "PREVIEW_TRUNCATE_LEN" => "",
        "SEF_FOLDER" => $sef_folder,
        "ROOT_FOLDER" => "/events/",
        "SEF_MODE" => "Y",
        "SEF_URL_TEMPLATES" => Array("detail"=>"#ELEMENT_CODE#/","news"=>"","section"=>""),
        "SET_LAST_MODIFIED" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "Y",
        "SHOW_404" => "N",
        "SORT_BY1" => "PROPERTY_PAST_DATE",
        "SORT_BY2" => "PROPERTY_START_DATETIME",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC",
        "USE_CATEGORIES" => "N",
        "USE_FILTER" => "N",
        "USE_PERMISSIONS" => "N",
        "USE_RATING" => "N",
        "USE_RSS" => "N",
        "USE_SEARCH" => "N",
        "USE_SHARE" => "N",
        "PARENT_SECTION_CODE" => "events",
        "NOT_FOUND_MESSAGE" => "Событий не найдено",
        "LIST_HEADER_TEXT" => "Календарь событий",
        "ICON_CLASS" => "i13"
    )
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>