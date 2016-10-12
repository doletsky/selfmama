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
?>
<? if (!empty($arResult['ITEMS'])) { ?>
<div class="left-part">
    <div class="item videos anim">
        <div class="wrapper">
            <h3>
                <span class="i i5"></span>
                Видео
            </h3>
            <? foreach ($arResult['ITEMS'] as $k => $arItem) { ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <a id="<?= $this->GetEditAreaId($arItem['ID']); ?>" href="<?=$arItem['LINK']?>" class="video fll fancy fancybox.iframe">
                    <span style="background-image: url('<?=$arItem['THUMB']?>');" class="img"></span>
                            <span class="info">
                                <strong><?=$arItem['DISPLAY_ACTIVE_FROM']?></strong>
                                    <div class="name"><?=$arItem['NAME']?></div>
                            </span>


                </a>
                <?if (($k+1) % 2 == 0) {?>
                    <div class="clr"></div>
                <?}?>
            <? } ?>
            <div class="clr"></div>
        </div>
    </div>
</div>
<?}?>
<div class="clr"></div>