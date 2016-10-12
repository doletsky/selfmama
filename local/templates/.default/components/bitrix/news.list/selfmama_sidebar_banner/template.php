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
    <div class="item banners">
        <div class="block">
            <div class="inner">
            <? foreach ($arResult['ITEMS'] as $arItem) { ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>" style="background-image: url('<?=$arItem['DETAIL_PICTURE']['SRC']?>')" class="banner">
                    <div class="ins">
                        <?=$arItem['PREVIEW_TEXT']?>
                        <a id="<?=$arItem['RUNTIME_BUTTON_CSS_ID']?>" href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>" class="btn">Узнать больше</a>
                    </div>
                </div>
            <? } ?>
            </div>
        </div>
        <?if (count($arResult['ITEMS']) > 1) {?>
            <div class="paginator paginator3"></div>
        <?}?>
    </div>
    <?
}?>