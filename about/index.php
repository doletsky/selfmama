<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Проект \"Selfmama\" - поддержка и реализация женщин с детьми");
$APPLICATION->SetTitle("О проекте ");
$APPLICATION->AddViewContent("page_wrapper_open", "<div class=\"about\">");
$APPLICATION->AddViewContent("page_wrapper_close", "</div>");
?>
    <div class="container">
        <?
        $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                "AREA_FILE_SHOW" => "page",
                "AREA_FILE_SUFFIX" => "about",
                "AREA_FILE_RECURSIVE" => "Y",
            )
        );
        ?>
        <?
        $APPLICATION->IncludeComponent("bitrix:news.list", "selfmama_team_list_about",
            Array(
                "IBLOCK_TYPE" => "sliders", // Тип информационного блока (используется только для проверки)
                "IBLOCK_ID" => "11", // Код информационного блока
                "NEWS_COUNT" => 4, // Количество новостей на странице
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
            ), false
        );
        ?>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>