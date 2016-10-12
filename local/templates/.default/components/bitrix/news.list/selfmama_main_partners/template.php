<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
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
//echo '<pre>';
//print_r($arResult);
//echo '</pre>';
?>


<? if (!empty($arResult['ITEMS'])) { ?>
<div class="partners">
    <div id="slider-counter"></div>
    <div class="container">
        <h3>
            <span class="i i6"></span>
            Наши партнеры
        </h3>

        <div class="inner">
                <div class="arr prev"></div>
                <ul>
                    <? foreach ($arResult['ITEMS'] as $arItem) { ?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <li><a href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" height="130" alt=""/></a></li>
                    <? } ?>
                </ul>


                <div class="arr next"></div>
        </div>
    </div>
</div>
<?
}?>