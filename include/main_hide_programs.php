<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?
global $arrEventFilter;
//$arrEventFilter['>=PROPERTY_START_DATETIME'] = date("Y-m-d");
$arrEventFilter[] = array('LOGIC' => 'OR', array('PROPERTY_END_DATETIME' => false, '>=PROPERTY_START_DATETIME' => date("Y-m-d")), array('>=PROPERTY_END_DATETIME' => date("Y-m-d")));
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "selfmama_programs_sidebar_hidden",
    array(
        "IBLOCK_TYPE" => "actions",
        "IBLOCK_ID" => "14",
        "NEWS_COUNT" => "5",
        "SORT_BY1" => "PROPERTY_START_DATETIME", // Поле для первой сортировки новостей
        "SORT_ORDER1" => "ASC", // Направление для первой сортировки новостей
        "SORT_BY2" => "SORT", // Поле для второй сортировки новостей
        "SORT_ORDER2" => "ASC", // Направление для второй сортировки новостей
        "FILTER_NAME" => "arrEventFilter",
        "FIELD_CODE" => array(
            0 => "PREVIEW_TEXT",
            1 => "DETAIL_PICTURE",
            2 => "",
        ),
        "PROPERTY_CODE" => array(
            0 => "REMOTE_LINK",
            1 => "TIMEPAD",
            2 => "VIEW_MODIFY",
            3 => "START_DATETIME",
            4 => "END_DATETIME",
            5 => "CATEGORY",
            6 => "ICON",
            7 => "LIST_COLOR",
            8 => "NOT_DISPLAY_DAY"
        ),
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "PREVIEW_TRUNCATE_LEN" => "",
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_STATUS_404" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "programs",
        "INCLUDE_SUBSECTIONS" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "PAGER_TEMPLATE" => ".default",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "Новости",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "PRODUCT_PRICE_CODES" => "BASE",
        "COMPONENT_TEMPLATE" => "selfmama_programs_sidebar",
        "SET_LAST_MODIFIED" => "N",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "SHOW_404" => "N",
        "MESSAGE_404" => ""
    ),
    false
);
?>