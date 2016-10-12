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
    <div class="contacts">
        <div class="container">
            <div class="top">
                <h1>
                    <span class="i i8"></span>
                    Контакты
                </h1>
            </div>

            <?foreach ($arResult['DIVISIONS'] as  $div_id => $arDivision) {?>
                <div class="block50 fll">
                    <div class="ins">
                        <h3>
                            <?=$arDivision?>
                        </h3>
                        <?foreach ($arResult['ITEMS_BY_DIVISION'][$div_id] as $arItem) {
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
                            <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="man">
                                <div class="team-img-wrapper">
                                    <img src="<?=$arItem['DETAIL_PICTURE']['SRC']?>" width="100" height="100" class="fll" alt=""/>
                                </div>
                                <div class="inf">
                            <span class="fw900">
                                <?=$arItem['NAME']?>
                            </span>

                                    <p><strong><a class="c-blue" href="mailto:<?=$arItem['DISPLAY_PROPERTIES']['EMAIL']['VALUE']?>"><?=$arItem['DISPLAY_PROPERTIES']['EMAIL']['VALUE']?></a></strong></p>
                                </div>

                            </div>
                        <?}?>
                    </div>
                </div>
            <?}?>
            <div class="clr"></div>
        </div>
    </div>
<?}?>