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
    <div class="comand">
        <div class="container">
            <h1><span class="i i8"></span>
                Команда
            </h1>
            <? foreach ($arResult['ITEMS'] as $arItem) { ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="member fll">

                    <div class="team-img-wrapper">
                        <img src="<?=$arItem['DETAIL_PICTURE']['SRC']?>" width="220" height="220" alt=""/>
                    </div>
                    <span class="fw900"><?=$arItem['NAME']?></span>

                    <p><?=$arItem['PREVIEW_TEXT']?>
                    </p>
                </div>
            <? } ?>
            <div class="clr"></div>
        </div>
    </div>
<?}?>