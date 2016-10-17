<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>


<?
global $arrEventFilter;
$arrEventFilter['<=PROPERTY_START_DATE'] = date("Y-m-d");
$APPLICATION->IncludeComponent("bitrix:news.list", "selfmama_events_sidebar",
    Array(
        "IBLOCK_TYPE" => "actions", // Тип информационного блока (используется только для проверки)
        "IBLOCK_ID" => "14", // Код информационного блока
        "NEWS_COUNT" => "1", // Количество новостей на странице
        "SORT_BY1" => "PROPERTY_START_DATETIME", // Поле для первой сортировки новостей
        "SORT_ORDER1" => "ASC", // Направление для первой сортировки новостей
        "SORT_BY2" => "SORT", // Поле для второй сортировки новостей
        "SORT_ORDER2" => "ASC", // Направление для второй сортировки новостей
        "FILTER_NAME" => "arrEventFilter", // Фильтр
        "FIELD_CODE" => array(// Поля
            0 => "PREVIEW_TEXT",
            1 => "DETAIL_PICTURE",
        ),
        "PROPERTY_CODE" => array(// Свойства
            "TIMEPAD",
            "VIEW_MODIFY",
            "START_DATETIME",
            "END_DATETIME",
            "CATEGORY",
            "ICON",
            "LIST_COLOR"
        ),
        "CHECK_DATES" => "Y", // Показывать только активные на данный момент элементы
        "DETAIL_URL" => "", // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
        "AJAX_MODE" => "N", // Включить режим AJAX
        "AJAX_OPTION_JUMP" => "N", // Включить прокрутку к началу компонента
        "AJAX_OPTION_STYLE" => "Y", // Включить подгрузку стилей
        "AJAX_OPTION_HISTORY" => "N", // Включить эмуляцию навигации браузера
        "CACHE_TYPE" => "A", // Тип кеширования
        "CACHE_TIME" => "36000000", // Время кеширования (сек.)
        "CACHE_FILTER" => "N", // Кешировать при установленном фильтре
        "CACHE_GROUPS" => "Y", // Учитывать права доступа
        "PREVIEW_TRUNCATE_LEN" => "", // Максимальная длина анонса для вывода (только для типа текст)
        "ACTIVE_DATE_FORMAT" => "d.m.Y", // Формат показа даты
        "SET_TITLE" => "N", // Устанавливать заголовок страницы
        "SET_BROWSER_TITLE" => "N", // Устанавливать заголовок окна браузера
        "SET_META_KEYWORDS" => "N", // Устанавливать ключевые слова страницы
        "SET_META_DESCRIPTION" => "N", // Устанавливать описание страницы
        "SET_STATUS_404" => "N", // Устанавливать статус 404, если не найдены элемент или раздел
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N", // Включать инфоблок в цепочку навигации
        "ADD_SECTIONS_CHAIN" => "N", // Включать раздел в цепочку навигации
        "HIDE_LINK_WHEN_NO_DETAIL" => "N", // Скрывать ссылку, если нет детального описания
        "PARENT_SECTION" => "", // ID раздела
        "PARENT_SECTION_CODE" => "events", // Код раздела
        "INCLUDE_SUBSECTIONS" => "Y", // Показывать элементы подразделов раздела
        "DISPLAY_DATE" => "Y", // Выводить дату элемента
        "DISPLAY_NAME" => "Y", // Выводить название элемента
        "DISPLAY_PICTURE" => "Y", // Выводить изображение для анонса
        "DISPLAY_PREVIEW_TEXT" => "Y", // Выводить текст анонса
        "PAGER_TEMPLATE" => ".default", // Шаблон постраничной навигации
        "DISPLAY_TOP_PAGER" => "N", // Выводить над списком
        "DISPLAY_BOTTOM_PAGER" => "Y", // Выводить под списком
        "PAGER_TITLE" => "Новости", // Название категорий
        "PAGER_SHOW_ALWAYS" => "N", // Выводить всегда
        "PAGER_DESC_NUMBERING" => "N", // Использовать обратную навигацию
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000", // Время кеширования страниц для обратной навигации
        "PAGER_SHOW_ALL" => "N", // Показывать ссылку "Все"
        "AJAX_OPTION_ADDITIONAL" => "", // Дополнительный идентификатор
        "PRODUCT_PRICE_CODES" => array(
            "BASE"
        ),
    ), false
);
?>
<?
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "selfmama_programs_sidebar",
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
            1 => "DETAIL_PICTURE"
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

<?//
//$APPLICATION->IncludeComponent("bitrix:news.list", "selfmama_programs_sidebar",
//    Array(
//        "IBLOCK_TYPE" => "actions", // Тип информационного блока (используется только для проверки)
//        "IBLOCK_ID" => "14", // Код информационного блока
//        "NEWS_COUNT" => "5", // Количество новостей на странице
//        "SORT_BY1" => "PROPERTY_START_DATETIME", // Поле для первой сортировки новостей
//        "SORT_ORDER1" => "ASC", // Направление для первой сортировки новостей
//        "SORT_BY2" => "SORT", // Поле для второй сортировки новостей
//        "SORT_ORDER2" => "ASC", // Направление для второй сортировки новостей
//        "FILTER_NAME" => "", // Фильтр
//        "FIELD_CODE" => array(// Поля
//            0 => "PREVIEW_TEXT",
//            1 => "DETAIL_PICTURE",
//        ),
//        "PROPERTY_CODE" => array(// Свойства
//            "TIMEPAD",
//            "VIEW_MODIFY",
//            "START_DATETIME",
//            "END_DATETIME",
//            "CATEGORY",
//            "ICON",
//            "LIST_COLOR",
//            "REMOTE_LINK"
//        ),
//        "CHECK_DATES" => "Y", // Показывать только активные на данный момент элементы
//        "DETAIL_URL" => "", // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
//        "AJAX_MODE" => "N", // Включить режим AJAX
//        "AJAX_OPTION_JUMP" => "N", // Включить прокрутку к началу компонента
//        "AJAX_OPTION_STYLE" => "Y", // Включить подгрузку стилей
//        "AJAX_OPTION_HISTORY" => "N", // Включить эмуляцию навигации браузера
//        "CACHE_TYPE" => "A", // Тип кеширования
//        "CACHE_TIME" => "36000000", // Время кеширования (сек.)
//        "CACHE_FILTER" => "N", // Кешировать при установленном фильтре
//        "CACHE_GROUPS" => "Y", // Учитывать права доступа
//        "PREVIEW_TRUNCATE_LEN" => "", // Максимальная длина анонса для вывода (только для типа текст)
//        "ACTIVE_DATE_FORMAT" => "d.m.Y", // Формат показа даты
//        "SET_TITLE" => "N", // Устанавливать заголовок страницы
//        "SET_BROWSER_TITLE" => "N", // Устанавливать заголовок окна браузера
//        "SET_META_KEYWORDS" => "N", // Устанавливать ключевые слова страницы
//        "SET_META_DESCRIPTION" => "N", // Устанавливать описание страницы
//        "SET_STATUS_404" => "N", // Устанавливать статус 404, если не найдены элемент или раздел
//        "INCLUDE_IBLOCK_INTO_CHAIN" => "N", // Включать инфоблок в цепочку навигации
//        "ADD_SECTIONS_CHAIN" => "N", // Включать раздел в цепочку навигации
//        "HIDE_LINK_WHEN_NO_DETAIL" => "N", // Скрывать ссылку, если нет детального описания
//        "PARENT_SECTION" => "", // ID раздела
//        "PARENT_SECTION_CODE" => "programs", // Код раздела
//        "INCLUDE_SUBSECTIONS" => "Y", // Показывать элементы подразделов раздела
//        "DISPLAY_DATE" => "Y", // Выводить дату элемента
//        "DISPLAY_NAME" => "Y", // Выводить название элемента
//        "DISPLAY_PICTURE" => "Y", // Выводить изображение для анонса
//        "DISPLAY_PREVIEW_TEXT" => "Y", // Выводить текст анонса
//        "PAGER_TEMPLATE" => ".default", // Шаблон постраничной навигации
//        "DISPLAY_TOP_PAGER" => "N", // Выводить над списком
//        "DISPLAY_BOTTOM_PAGER" => "Y", // Выводить под списком
//        "PAGER_TITLE" => "Новости", // Название категорий
//        "PAGER_SHOW_ALWAYS" => "N", // Выводить всегда
//        "PAGER_DESC_NUMBERING" => "N", // Использовать обратную навигацию
//        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000", // Время кеширования страниц для обратной навигации
//        "PAGER_SHOW_ALL" => "N", // Показывать ссылку "Все"
//        "AJAX_OPTION_ADDITIONAL" => "", // Дополнительный идентификатор
//        "PRODUCT_PRICE_CODES" => array(
//            "BASE"
//        ),
//    ), false
//);
//?>

<?
$APPLICATION->IncludeComponent("bitrix:news.list", "selfmama_sidebar_banner",
    Array(
        "IBLOCK_TYPE" => "sliders", // Тип информационного блока (используется только для проверки)
        "IBLOCK_ID" => "5", // Код информационного блока
        "NEWS_COUNT" => "5", // Количество новостей на странице
        "SORT_BY1" => "SORT", // Поле для первой сортировки новостей
        "SORT_ORDER1" => "ASC", // Направление для первой сортировки новостей
        "SORT_BY2" => "ACTIVE_FROM", // Поле для второй сортировки новостей
        "SORT_ORDER2" => "DESC", // Направление для второй сортировки новостей
        "FILTER_NAME" => "", // Фильтр
        "FIELD_CODE" => array(// Поля
            0 => "PREVIEW_TEXT",
            1 => "DETAIL_PICTURE",
        ),
        "PROPERTY_CODE" => array(// Свойства
            "SLIDE_TYPE_ALT",
            "LINK",
            "HOVER_COLOR",
            "BUTTON_COLOR",
            "BUTTON_COLOR_2"
        ),
        "CHECK_DATES" => "Y", // Показывать только активные на данный момент элементы
        "DETAIL_URL" => "", // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
        "AJAX_MODE" => "N", // Включить режим AJAX
        "AJAX_OPTION_JUMP" => "N", // Включить прокрутку к началу компонента
        "AJAX_OPTION_STYLE" => "Y", // Включить подгрузку стилей
        "AJAX_OPTION_HISTORY" => "N", // Включить эмуляцию навигации браузера
        "CACHE_TYPE" => "A", // Тип кеширования
        "CACHE_TIME" => "36000000", // Время кеширования (сек.)
        "CACHE_FILTER" => "N", // Кешировать при установленном фильтре
        "CACHE_GROUPS" => "Y", // Учитывать права доступа
        "PREVIEW_TRUNCATE_LEN" => "", // Максимальная длина анонса для вывода (только для типа текст)
        "ACTIVE_DATE_FORMAT" => "d.m.Y", // Формат показа даты
        "SET_TITLE" => "N", // Устанавливать заголовок страницы
        "SET_BROWSER_TITLE" => "N", // Устанавливать заголовок окна браузера
        "SET_META_KEYWORDS" => "N", // Устанавливать ключевые слова страницы
        "SET_META_DESCRIPTION" => "N", // Устанавливать описание страницы
        "SET_STATUS_404" => "N", // Устанавливать статус 404, если не найдены элемент или раздел
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N", // Включать инфоблок в цепочку навигации
        "ADD_SECTIONS_CHAIN" => "N", // Включать раздел в цепочку навигации
        "HIDE_LINK_WHEN_NO_DETAIL" => "N", // Скрывать ссылку, если нет детального описания
        "PARENT_SECTION" => "", // ID раздела
        "PARENT_SECTION_CODE" => "sidebar_banner", // Код раздела
        "INCLUDE_SUBSECTIONS" => "Y", // Показывать элементы подразделов раздела
        "DISPLAY_DATE" => "Y", // Выводить дату элемента
        "DISPLAY_NAME" => "Y", // Выводить название элемента
        "DISPLAY_PICTURE" => "Y", // Выводить изображение для анонса
        "DISPLAY_PREVIEW_TEXT" => "Y", // Выводить текст анонса
        "PAGER_TEMPLATE" => ".default", // Шаблон постраничной навигации
        "DISPLAY_TOP_PAGER" => "N", // Выводить над списком
        "DISPLAY_BOTTOM_PAGER" => "Y", // Выводить под списком
        "PAGER_TITLE" => "Новости", // Название категорий
        "PAGER_SHOW_ALWAYS" => "N", // Выводить всегда
        "PAGER_DESC_NUMBERING" => "N", // Использовать обратную навигацию
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000", // Время кеширования страниц для обратной навигации
        "PAGER_SHOW_ALL" => "N", // Показывать ссылку "Все"
        "AJAX_OPTION_ADDITIONAL" => "", // Дополнительный идентификатор
        "PRODUCT_PRICE_CODES" => array(
            "BASE"
        ),
    ), false
);
?>