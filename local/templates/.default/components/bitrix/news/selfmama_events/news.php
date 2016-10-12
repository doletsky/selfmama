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

$arParams['FILTER_NAME'] =  'arrFilter';
$arParams['component'] = $component;

$year = !empty($_REQUEST['YEAR']) ? $_REQUEST['YEAR']:date("Y");
$arParams['YEAR'] = $year;
if (intval($year)) {
    global $arrFilter;
    $arrFilter = array();
    $helpers = SelfmamaHelper::getInstance();
    if ($_REQUEST['MODE'] == 'past') {
        $arrFilter[] = array(
            'LOGIC' => 'OR',
                array(
                    '<PROPERTY_START_DATETIME' => date("$year-m-d H:i:s"),
                    'PROPERTY_END_DATETIME' => false
                    ),
                array(
                    'LOGIC' => 'AND',
                    array(">PROPERTY_END_DATETIME" => $helpers->getYearFilterDate($year, SelfmamaHelper::START_YEAR)),
                    array("<PROPERTY_END_DATETIME" => date("$year-m-d H:i:s"))
                )
//            'LOGIC' => 'AND',
//            array(">PROPERTY_END_DATETIME" => $helpers->getYearFilterDate($year, SelfmamaHelper::START_YEAR)),
//            array("<PROPERTY_END_DATETIME" => date("Y-m-d H:i:s"))
        );

        $arParams['MODE'] = 'past';
    } else if ($_REQUEST['MODE'] == 'future') {
        $arrFilter[] = array(
            'LOGIC' => 'AND',
            array(">PROPERTY_START_DATETIME" => date("$year-m-d H:i:s")),
            array('LOGIC' => 'OR',
                array("PROPERTY_END_DATETIME" => false),
                array("<PROPERTY_END_DATETIME" => $helpers->getYearFilterDate($year, SelfmamaHelper::END_YEAR))
            )
        );
        $arParams['MODE'] = 'future';
    } else if ($_REQUEST['MODE'] == 'current') {
        /*if ($year == date("Y")) {
            $_year = $year;
        } else {
            $_year = date("Y");
        }*/
        $arrFilter = array(
            array(
                "LOGIC" => "OR",
                array(
                    array(
                        'LOGIC' => 'AND',
                        array(">=PROPERTY_START_DATETIME" => date("$year-m-d 00:00:00")),
                        array("<PROPERTY_START_DATETIME" => date("$year-m-d 23:59:59")),
                        array("PROPERTY_END_DATETIME" => false)
                    ),
                ),
                array(
                    'LOGIC' => 'AND',
                    array(">=PROPERTY_END_DATETIME" => date("$year-m-d H:i:s")),
                    array("<PROPERTY_START_DATETIME" => date("$year-12-31 23:59:59"))
                ),
            ),
        );
        $arParams['MODE'] = 'current';
    } else {
        $arrFilter = array(
            array(
                "LOGIC" => "OR",
                array(
                    array(
                        'LOGIC' => 'AND',
                        array(">PROPERTY_END_DATETIME" => $helpers->getYearFilterDate($year, SelfmamaHelper::START_YEAR)),
                        array("<PROPERTY_END_DATETIME" => $helpers->getYearFilterDate($year, SelfmamaHelper::END_YEAR)),
                        array("!PROPERTY_END_DATETIME" => false)
                    ),
                ),
                array(
                    array(
                        'LOGIC' => 'AND',
                        array(">PROPERTY_START_DATETIME" => $helpers->getYearFilterDate($year, SelfmamaHelper::START_YEAR)),
                        array("<PROPERTY_START_DATETIME" => $helpers->getYearFilterDate($year, SelfmamaHelper::END_YEAR)),
                        array("PROPERTY_END_DATETIME" => false),
                        array("!PROPERTY_START_DATETIME" => true)
                    ),
                ),
            ),
        );
    }

}
cDump($arrFilter);
CStorage::setVar($arParams, "arParams");
?>

<?
if (Phery::is_ajax() && $_REQUEST['phery']['remote'] == 'pagenav') {
    $APPLICATION->RestartBuffer();
    Phery::instance()->set(
        array(
            'pagenav' => function($ajax_data){

                global $APPLICATION;
                global $HTTP_GET_VARS;
                global $_REQUEST;
                global $_GET;
                global $NavNum;
                if (!empty($ajax_data['page']) && !empty($ajax_data['pagen'])) {
                    //$NavNum = $ajax_data['pagen']-1;//подменяем глобальную переменную так, чтобы PAGEN совпадал с количеством пагинаций на web-странице при аяксовом запросе
                    ob_start();
                    $APPLICATION->IncludeFile("/include/events.php", CStorage::getVar("arParams"));
                    $html = ob_get_clean();
                    return PheryResponse::factory("#events_html")->html($html)/*->script(DeepSoundHelpers::getPushStateScript())*/;
                }
                return false;
            },
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

<?$APPLICATION->IncludeFile("/include/events.php",
    $arParams
);?>
