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
global $APPLICATION;
?>
<? if (!empty($arResult['ITEMS'])) {?>
    <div class="other-articles anim">
        <div class="container">
            <h3><a href="#"><span class="i i1"></span>Другие статьи</a></h3>
                <?if ($arParams['IS_AJAX']) $APPLICATION->RestartBuffer();?>
    <?foreach ($arResult['ITEMS'] as $k => $arItem) {
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        $arCategory = $arResult['CATEGORIES'][$arItem['CAT_ID']]?>
                <a  href="<?=$arItem['DETAIL_PAGE_URL']?>" <?=$arItem['TARGET']?> style="background-image: url('<?=$arItem['DETAIL_PICTURE']['SRC']?>')" class="article <?=$arItem['CLASS']?>">
                    <span class="overlay">
                        <span id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="info">
                            <span class="ins">
                            <?/*<span class="top">
                                <span class="tag fll" style="background: <?=$arCategory['PROPERTY_COLOR_VALUE']?>"><?=$arCategory['NAME']?></span>

                                <?if (empty($arItem['DISPLAY_PROPERTIES']['REMOTE_LINK']['VALUE'])) {?>
                                    <span class="likes fll">
                                        <span class="views fll"><?=$arItem['VIEWS']?></span>
                                        <span class="comments fll"><?=$arItem['COMMENTS']?></span>
                                    </span>
                                <?}?>
                            </span>*/?>
                            <div class="name"><?=$arItem['NAME']?></div>
                            <p><?=trim($arItem['PREVIEW_TEXT'])?></p>
                            </span>
                        </span>
                    </span>
                </a>
            <?
        }?>
            </div>
        </div>
<?}?>