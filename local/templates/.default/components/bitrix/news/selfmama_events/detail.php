<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$sections_to_template = array(
    'programs' => 'selfmama_program_detail',
    'events' => 'selfmama_event_detail'
);
?>
<?if (empty($arResult['VARIABLES']['ELEMENT_ID'])) {
    $element_id = BXHelper::getElementIdByCode($arParams['IBLOCK_ID'],$arResult['VARIABLES']['ELEMENT_CODE']);
    $elements = BXHelper::getElements(
        array(),
        array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'CODE' => $arResult['VARIABLES']['ELEMENT_CODE']),
        false,
        false,
        array('ID', 'PROPERTY_REMOTE_LINK')
    );
    $element_id = $elements['RESULT'][0]['ID'];
    $link = $elements['RESULT'][0]['PROPERTY_REMOTE_LINK_VALUE'];
    if ($link) {
        header("HTTP/1.1 301 Moved Permanently");
        header('Location: '.$link);
    }
} else {
    $element_id = $arResult['VARIABLES']['ELEMENT_ID'];
}?>



<?
if (!intval($_REQUEST['YEAR'])) BXHelper::NotFound();

$year = $_REQUEST['YEAR'];

$element_exist = CIBlockElement::GetList(
    array(),
    array(
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'ID' => $element_id,
        '>=PROPERTY_START_DATETIME' => $year."-01-01 00:00:00",
        '<PROPERTY_START_DATETIME' => ($year+1)."-01-01 00:00:00",
        'ACTIVE' => 'Y',
        'SECTION_CODE' =>  $arParams['PARENT_SECTION_CODE']
    ),
    array()
);
if (!intval($element_exist)) BXHelper::NotFound();
?>
<?/*$count = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 10, 'ACTIVE' => 'Y', 'PROPERTY_LINKED' =>  $element_id), array());*/?>
<?/*$APPLICATION->IncludeComponent(
    "selfmama:comment.form",
    "",
    Array(
        "IBLOCK_ID" => '10',
        "TO_ELEMENT_FORM" => $element_id,
        "USER_ID" => $USER->GetID(),
        "MODULES" => array(
            "iblock"
        ),
        "USER_SELECT" => array(),
        "USER_FIELDS" => array("PERSONAL_PHOTO"),
        "COMMENT_COUNT" => $count,
        "SOCIALS_IBLOCK_ID" => '9'

    ),
    $component
);*/?>
<?/*$comment_form_html = ob_get_clean();*/?>

<?/*ob_start();?>
<?$article_id = $element_id?>
<?if (!empty($article_id)) {?>
    <div class="comments-list">
        <?=$comment_form_html?>

        <?
        $arSort = $GLOBALS['APPLICATION']->IncludeFile(
            "/local/include/sorting_empty.php",
            array(
                'sortFields' => array(
                    'sort_1' => array('CODE' => 'CREATED_AT'),
                ),
                'aliases' => array(
                    'CREATED_AT' => 'created'
                )
            ),
            array('SHOW_BORDER' => 'N')
        );
        ?>

        <?
        ?>

        <?if (!empty($count)) {?>
            <div class="filter">
                <?if (empty($arSort['ORDER'])) {
                    $arSort = $arSort['OTHER_SORT']['CREATED_AT'];
                }?>
                <?if ($arSort['ORDER'] == 'desc') {
                    $sname = 'Сначала старые';
                } else {
                    $arSort['ORDER'] = 'asc';
                    $sname = 'Сначала новые';
                }?>
                <a href="<?=$arSort['LINK']?>" class="c-blue sort fll <?=$arSort['ORDER']?>"><strong><?=$sname?></strong></a>

                <a href="/rss_events.php" class="rss flr">Подписаться</a>
            </div>
        <?}?>
        <?
        global $arThreadFilter;
        $arThreadFilter['!PROPERTY_IS_ROOT'] = false;
        $arThreadFilter['PROPERTY_LINKED'] = $article_id;

        $APPLICATION->IncludeComponent("bitrix:news.list", "selfmama_comment_list",
            Array(
                "IBLOCK_TYPE" => "social", // Тип информационного блока (используется только для проверки)
                "IBLOCK_ID" => "10", // Код информационного блока
                "NEWS_COUNT" => "4", // Количество новостей на странице
                "SORT_BY1" => "CREATED_AT", // Поле для первой сортировки новостей
                "SORT_ORDER1" => strtoupper($arSort['ORDER']), // Направление для первой сортировки новостей
                "SORT_BY2" => "SORT", // Поле для второй сортировки новостей
                "SORT_ORDER2" => "ASC", // Направление для второй сортировки новостей
                "FILTER_NAME" => "arThreadFilter", // Фильтр
                "FIELD_CODE" => array(// Поля
                    0 => "PREVIEW_TEXT",
                    1 => "DETAIL_PICTURE",
                ),
                "PROPERTY_CODE" => array(// Свойства
                    "SOCIAL",
                    "USER",
                    "ANSWERS",
                    "THREAD"
                ),
                "CHECK_DATES" => "N", // Показывать только активные на данный момент элементы
                "DETAIL_URL" => "", // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                "AJAX_MODE" => "N", // Включить режим AJAX
                "AJAX_OPTION_JUMP" => "N", // Включить прокрутку к началу компонента
                "AJAX_OPTION_STYLE" => "Y", // Включить подгрузку стилей
                "AJAX_OPTION_HISTORY" => "N", // Включить эмуляцию навигации браузера
                "CACHE_TYPE" => "N", // Тип кеширования
                "CACHE_TIME" => "0", // Время кеширования (сек.)
                "CACHE_FILTER" => "N", // Кешировать при установленном фильтре
                "CACHE_GROUPS" => "N", // Учитывать права доступа
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
                )
            ), false
        );

        ?>
    </div>
<?}?>
<?$comments_html = ob_get_clean();*/?>

<?
if ($sections_to_template[$arParams['PARENT_SECTION_CODE']]) {
    $ElementID = $APPLICATION->IncludeComponent(
        "bitrix:news.detail",
        $sections_to_template[$arParams['PARENT_SECTION_CODE']],
        Array(
            "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
            "DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
            "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
            "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
            "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
            "DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
            "SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
            "META_KEYWORDS" => $arParams["META_KEYWORDS"],
            "META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
            "BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
            "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
            "SET_TITLE" => $arParams["SET_TITLE"],
            "SET_STATUS_404" => $arParams["SET_STATUS_404"],
            "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
            "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
            "ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
            "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
            "DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
            "DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
            "PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
            "PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
            "CHECK_DATES" => $arParams["CHECK_DATES"],
            "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
            "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
            "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
            "USE_SHARE" 			=> $arParams["USE_SHARE"],
            "SHARE_HIDE" 			=> $arParams["SHARE_HIDE"],
            "SHARE_TEMPLATE" 		=> $arParams["SHARE_TEMPLATE"],
            "SHARE_HANDLERS" 		=> $arParams["SHARE_HANDLERS"],
            "SHARE_SHORTEN_URL_LOGIN"	=> $arParams["SHARE_SHORTEN_URL_LOGIN"],
            "SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
            "ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
            'COMMENT_COUNT' => CStorage::getVar('comment_count'),
            "COMMENTS_HTML" => $arParams['PARENT_SECTION_CODE'] == 'events' ? $comments_html:""
        ),
        $component
    );
}
?>
<?if($arParams["USE_RATING"]=="Y" && $ElementID):?>
<?$APPLICATION->IncludeComponent(
	"bitrix:iblock.vote",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ELEMENT_ID" => $ElementID,
		"MAX_VOTE" => $arParams["MAX_VOTE"],
		"VOTE_NAMES" => $arParams["VOTE_NAMES"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
	),
	$component
);?>
<?endif?>
<?if($arParams["USE_CATEGORIES"]=="Y" && $ElementID):
	global $arCategoryFilter;
	$obCache = new CPHPCache;
	$strCacheID = $componentPath.LANG.$arParams["IBLOCK_ID"].$ElementID.$arParams["CATEGORY_CODE"];
	if(($tzOffset = CTimeZone::GetOffset()) <> 0)
		$strCacheID .= "_".$tzOffset;
	if($arParams["CACHE_TYPE"] == "N" || $arParams["CACHE_TYPE"] == "A" && COption::GetOptionString("main", "component_cache_on", "Y") == "N")
		$CACHE_TIME = 0;
	else
		$CACHE_TIME = $arParams["CACHE_TIME"];
	if($obCache->StartDataCache($CACHE_TIME, $strCacheID, $componentPath))
	{
		$rsProperties = CIBlockElement::GetProperty($arParams["IBLOCK_ID"], $ElementID, "sort", "asc", array("ACTIVE"=>"Y","CODE"=>$arParams["CATEGORY_CODE"]));
		$arCategoryFilter = array();
		while($arProperty = $rsProperties->Fetch())
		{
			if(is_array($arProperty["VALUE"]) && count($arProperty["VALUE"])>0)
			{
				foreach($arProperty["VALUE"] as $value)
					$arCategoryFilter[$value]=true;
			}
			elseif(!is_array($arProperty["VALUE"]) && strlen($arProperty["VALUE"])>0)
				$arCategoryFilter[$arProperty["VALUE"]]=true;
		}
		$obCache->EndDataCache($arCategoryFilter);
	}
	else
	{
		$arCategoryFilter = $obCache->GetVars();
	}
	if(count($arCategoryFilter)>0):
		$arCategoryFilter = array(
			"PROPERTY_".$arParams["CATEGORY_CODE"] => array_keys($arCategoryFilter),
			"!"."ID" => $ElementID,
		);
		?>
		<hr /><h3><?=GetMessage("CATEGORIES")?></h3>
		<?foreach($arParams["CATEGORY_IBLOCK"] as $iblock_id):?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				$arParams["CATEGORY_THEME_".$iblock_id],
				Array(
					"IBLOCK_ID" => $iblock_id,
					"NEWS_COUNT" => $arParams["CATEGORY_ITEMS_COUNT"],
					"SET_TITLE" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"FILTER_NAME" => "arCategoryFilter",
					"CACHE_FILTER" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
				),
				$component
			);?>
		<?endforeach?>
	<?endif?>
<?endif?>

<?
if ($arParams['PARENT_SECTION_CODE'] == "programs") {
    echo $comments_html;
    global $arBottomFilter;
    $arBottomFilter['!ID'] = $ElementID;
    $APPLICATION->IncludeComponent("bitrix:news.list", "selfmama_events_list_bottom",
        Array(
            "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'], // Тип информационного блока (используется только для проверки)
            "IBLOCK_ID" => $arParams['IBLOCK_ID'], // Код информационного блока
            "NEWS_COUNT" => "3", // Количество новостей на странице
            "SORT_BY1" => "ACTIVE_FROM", // Поле для первой сортировки новостей
            "SORT_ORDER1" => "DESC", // Направление для первой сортировки новостей
            "SORT_BY2" => "SORT", // Поле для второй сортировки новостей
            "SORT_ORDER2" => "ASC", // Направление для второй сортировки новостей
            "FILTER_NAME" => "arBottomFilter", // Фильтр
            "FIELD_CODE" => array(// Поля
                0 => "PREVIEW_TEXT",
                1 => "DETAIL_PICTURE",
            ),
            "PROPERTY_CODE" => array(// Свойства
                "CATEGORY",
                "VIEW_MODIFY",
                "TIMEPAD",
                "PRICE",
                "START_DATETIME",
                "END_DATETIME",
                "REMOTE_LINK",
                "NOT_DISPLAY_DAY"
            ),
            "CHECK_DATES" => "N", // Показывать только активные на данный момент элементы
            "DETAIL_URL" => "", // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
            "AJAX_MODE" => "N", // Включить режим AJAX
            "AJAX_OPTION_JUMP" => "N", // Включить прокрутку к началу компонента
            "AJAX_OPTION_STYLE" => "Y", // Включить подгрузку стилей
            "AJAX_OPTION_HISTORY" => "N", // Включить эмуляцию навигации браузера
            "CACHE_TYPE" => "N", // Тип кеширования
            "CACHE_TIME" => "0", // Время кеширования (сек.)
            "CACHE_FILTER" => "N", // Кешировать при установленном фильтре
            "CACHE_GROUPS" => "N", // Учитывать права доступа
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
            "PARENT_SECTION_CODE" => $arParams['PARENT_SECTION_CODE'], // Код раздела
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
            "SEF_FOLDER" => $arParams["ROOT_FOLDER"],
        ), false
    );
}
?>
<script>
    $(function () {
        $('body').on('click', 'a.reply_to', function (event) {
            event.preventDefault();
            $(this).toggleClass('active');
            $(this).parents('.root-comments').find('a.reply_to').not($(this)).removeClass('active').text($(this).data('inactive-text'));
            if ($(this).is('.active')) {
                $(this).text($(this).data('active-text'));
                $('#comment-form [name=reply_comment]').val($(this).siblings('[name=comment_id]').val());
                $('#comment-form [name=reply_thread]').val($(this).siblings('[name=thread_id]').val());
                $('#comment-form [name=user_comment]').val($('#comment-form [name=user_comment]').val()+" "+$(this).siblings('[name=reply_name]').val()+",");
            } else {
                $(this).text($(this).data('inactive-text'));
                $('#comment-form [name=reply_comment]').val('');
                $('#comment-form [name=reply_thread]').val('');
            }
        });
    });
</script>
