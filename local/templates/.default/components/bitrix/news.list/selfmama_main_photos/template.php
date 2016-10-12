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
<? if (!empty($arResult['GROUPS'])) {
    $paginator = "";?>
    <div class="item photos">
        <h3>
            <?if ($arParams['MAIN_PAGE']) {?><a href="<?=$arParams['SEF_FOLDER']?>"><?}?>
                <span class="i i4"></span>
                Фото
                <?if ($arParams['MAIN_PAGE']) {?></a><?}?>
        </h3>
        <div <?if ($arParams['BORDER_COLOR']) {?> style="background-color: <?=$arParams['BORDER_COLOR']?>" <?}?>class="gallery">
            <div class="inner">
                <?foreach ($arResult['GROUPS'] as $k => $arGroup) {
                    $paginator .= "<a class=\"".(!$k ? "active" : "")."\" href=\"#gal".$k."\"><span></span></a>"?>
                    <div id="gal<?=$k?>" <?if (!$k) {?>style="display: block;"<?}?> class="area">
                        <ul>
                            <li>
                            <?foreach ($arGroup as $arItem) {?>
                                <?
                                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                                ?>
                                    <a class="anim fancy" href="<?=$arItem['PREVIEW_PICTURE']['SRC']?>">
                                    <span id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="background-image: url('<?=$arItem['DETAIL_PICTURE']['SRC']?>')" class="hover">
                                        <span id="<?=$arItem['RUNTIME_CSS_ID']?>" class="over">
                                            <div class="name">
                                                <?=$arItem['NAME']?>
                                            </div>
                                        </span>
                                    </span>
                                    </a>
                            <?}?>
                            </li>
                        </ul>
                    </div>
                <?}?>
            </div>


            <?if (count($arResult['GROUPS']) > 1) {?>
                <div class="paginator paginator1">
                    <?=$paginator?>
                </div>
            <?}?>
        </div>
    </div>
<?}?>