<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "SelfMama Место силы современных мам");
$APPLICATION->SetPageProperty("description", "SelfMama | Место силы современных мам");
$APPLICATION->SetPageProperty("title", "SelfMama | Место силы современных мам");
$APPLICATION->SetTitle("Проект \"Selfmama\"");
?><?ob_start();?>
<?
$APPLICATION->IncludeFile("/include/main_photos.php");
?>
<?$photos_html = ob_get_clean();?>
<?ob_start();?>
<?
$APPLICATION->IncludeFile("/include/main_hide_video.php");
?>
<?$video_html = ob_get_clean();?>
<?ob_start();?>
<?
$APPLICATION->IncludeFile("/include/main_hide_events.php");
?>
<?$events_html = ob_get_clean();?>
<?ob_start();?>
<?
$APPLICATION->IncludeFile("/include/main_hide_programs.php");
?>
<?$programs_html = ob_get_clean();?>
<?ob_start();?>
<?
$APPLICATION->IncludeFile("/include/main_hide_banners.php");
?>
<?$banners_html = ob_get_clean();?>
<?$APPLICATION->IncludeFile("/include/articles.php",
    Array(
        "IBLOCK_TYPE" => "articles", // Тип информационного блока (используется только для проверки)
        "IBLOCK_ID" => "6", // Код информационного блока
        "NEWS_COUNT" => "5", // Количество новостей на странице
        "SORT_BY1" => "ACTIVE_FROM", // Поле для первой сортировки новостей
        "SORT_ORDER1" => "DESC", // Направление для первой сортировки новостей
        "SORT_BY2" => "SORT", // Поле для второй сортировки новостей
        "SORT_ORDER2" => "ASC", // Направление для второй сортировки новостей
        "FILTER_NAME" => "", // Фильтр
        "FIELD_CODE" => array(// Поля
            0 => "PREVIEW_TEXT",
            1 => "DETAIL_PICTURE",
            2 => "SHOW_COUNTER"
        ),
        "PROPERTY_CODE" => array(// Свойства
            "VIEW_MODIFY",
            "CATEGORY",
            "REMOTE_LINK"
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
        "PARENT_SECTION_CODE" => "top_slider", // Код раздела
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
        "MAIN_PAGE" => MAIN_PAGE,
        "SEF_FOLDER" => "/articles/",
        "PHOTOS_HTML" => $photos_html,
        "HIDE_VIDEO_HTML" => $video_html,
        "HIDE_EVENTS_HTML" => $events_html,
        "HIDE_PROGRAMS_HTML" => $programs_html,
        "HIDE_BANNERS_HTML" => $banners_html,
    )
    );?>
<?
/*$APPLICATION->IncludeComponent("bitrix:news.list", "selfmama_main_partners",
    Array(
        "IBLOCK_TYPE" => "sliders", // Тип информационного блока (используется только для проверки)
        "IBLOCK_ID" => "15", // Код информационного блока
        "NEWS_COUNT" => "20", // Количество новостей на странице
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
);*/
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>