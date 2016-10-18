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
?>
<?
$arParams['DETAIL_URL'] = $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"];
$arParams['SECTION_URL'] = $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"];
$arParams['IBLOCK_URL'] = $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"];

$arParams['FIELD_CODE'] = $arParams["LIST_FIELD_CODE"];
$arParams['PROPERTY_CODE'] = $arParams["LIST_PROPERTY_CODE"];
$arParams['ACTIVE_DATE_FORMAT'] = $arParams["LIST_ACTIVE_DATE_FORMAT"];

$arParams['component'] = $component;

CStorage::setVar($arParams, "arParams");
?>

<?
if (Phery::is_ajax() && $_REQUEST['phery']['remote'] == 'more') {
    $APPLICATION->RestartBuffer();
    Phery::instance()->set(
        array(
            'more' =>  function($ajax_data){
                global $APPLICATION;
                global $NavNum;
                if (!empty($ajax_data['page']) && !empty($ajax_data['pagen']) && !empty($ajax_data['count'])) {
                    //$NavNum = $ajax_data['pagen']-1;//подменяем глобальную переменную так, чтобы PAGEN совпадал с количеством пагинаций на web-странице при аяксовом запросе
                    CStorage::setVar(array("START_PAGE" => $_REQUEST["START_PAGE"], "END_PAGE" => $_REQUEST["END_PAGE"]), "PAGINATION_LIMITS");
                    $arParams = CStorage::getVar("arParams");
                    $arParams['IS_AJAX'] = true;
                    $arParams['LAST_COUNT'] = $ajax_data['count'];
                    $arParams['NEWS_COUNT'] = 4;

                    //*****Мухлеж, так как первая выборка идет на 5 статей, а яксовая выборка идет на 4 статьи.
                    // Из-за этого смещается выборка на 1 статью и показывается лишняя при аяксовой подгрузке
                    //для этого получаем выборку статей с первой страницы на 5 штук, и заносим ID последней в исключения через arrFilter;
                    $topCount = 5;

                    //получаем топ 5 статей с первой страницы
                    $top_elements = BXHelper::getElements(array(
                        $arParams['SORT_BY1'] => $arParams['SORT_ORDER1'],
                        'ID' => 'DESC',
                        $arParams['SORT_BY2'] => $arParams['SORT_ORDER2'],
                        ),
                        array('ACTIVE' => 'Y', 'ACTIVE_DATE' => 'Y', 'CHECK_PERMISSIONS' =>'Y', 'IBLOCK_ID' => 6, 'IBLOCK_LID' => 's1'), false, array('nTopCount' => $topCount), array('ID', 'NAME'), false);
                    $top_elements = $top_elements['RESULT'];

                    //инициализируем arrFilter
                    if (empty($arParams['FILTER_NAME'])) {
                        $fName = $arParams['FILTER_NAME'] = 'arrFilter';
                    } else {
                        $fName = $arParams['FILTER_NAME'];
                    }


                    //заносим в исключения
                    $GLOBALS[$fName]['!ID'] = $top_elements[$topCount-1]['ID'];
                    //уменьшаем глобальную переменную NavNum, так как GetList (он находится в хелперской обертке BXHelper::GetElements) увеличивает порядковый номер пагинаций на единицу (тупой потому что)
                    $NavNum--;

                    ob_start();
                    $APPLICATION->IncludeFile("/include/articles.php", $arParams);
                    $html = ob_get_clean();
                    $response = PheryResponse::factory("#articles");
//                    $response = $response->jquery("#pagination_".$ajax_data['pagen']."_".$ajax_data['page'])->remove();
                    return $response->jquery("#pagination_".$ajax_data['pagen']."_".$ajax_data['page'])->remove()->jquery('#articles')->append($html)->jquery("#pagination_".$ajax_data['pagen']."_".($ajax_data['page']+1))->insertAfter('#articles')->jquery('.article')->addClass('block');
                }

            }
        )
    )->process();
}?>

<?if($arParams["USE_RSS"]=="Y"):?>
    <?
    if(method_exists($APPLICATION, 'addheadstring'))
        $APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" href="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" />');
    ?>
    <a href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"]?>" title="rss" target="_self"><img alt="RSS" src="<?=$templateFolder?>/images/gif-light/feed-icon-16x16.gif" border="0" align="right" /></a>
<?endif?>

<?if($arParams["USE_SEARCH"]=="Y"):?>
    <?=GetMessage("SEARCH_LABEL")?><?$APPLICATION->IncludeComponent(
        "bitrix:search.form",
        "flat",
        Array(
            "PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"]
        ),
        $component
    );?>
    <br />
<?endif?>
<?if($arParams["USE_FILTER"]=="Y"):?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:catalog.filter",
        "",
        Array(
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "FILTER_NAME" => $arParams["FILTER_NAME"],
            "FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
            "PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        ),
        $component
    );
    ?>
    <br />
<?endif?>

<?$APPLICATION->IncludeFile("/include/articles.php",
    $arParams
);?>
