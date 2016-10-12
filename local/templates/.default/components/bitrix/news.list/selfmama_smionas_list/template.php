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
<? if (!empty($arResult['ITEMS'])) {
    ?>
<div class="smi anim">
    <div id="smionas" class="container">
        <h3><span class="i i9"></span>
            СМИ О нас
        </h3>
    <?if ($arParams['IS_AJAX']) $APPLICATION->RestartBuffer();?>
    <?foreach ($arResult['ITEMS'] as $k => $arItem) {
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        $arCategory = $arResult['CATEGORIES'][$arItem['CAT_ID']]?>
        <a href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>" style="background-image: url('<?=$arItem['DETAIL_PICTURE']['SRC']?>')" class="block">

            <span class="overlay"></span>
                <span class="info">
                    <span class="ins">
                        <?if (!empty($arItem['DISPLAY_PROPERTIES']['WATERMARK'])) {?>
                            <img src="<?=$arItem['DISPLAY_PROPERTIES']['WATERMARK']['FILE_VALUE']['SRC']?>" width="71" height="16" alt=""/>
                        <?}?>
                        <span class="name"><?=$arItem['NAME']?></span>
                    </span>
                </span>
        </a>
        <?if (($k+1) % 3 == 0) {?><div class="clr"></div><?}?>
        <?}?>
        </div>
    <?if ($arResult['FULL_COUNT'] < $arResult['NAVI']['nSelectedCount']) {
        echo Phery::link_to(
            'Показать еще',
            'more_smi',
            array(
                'class' => 'btn see-more no-bg',
                'id' => 'pagination_' . $arResult['NAV_RESULT']->NavNum."_".$arResult['END_PAGE_MORE'],
                'href' => $APPLICATION->GetCurPageParam("START_PAGE=" . $arResult['START_PAGE_MORE'] . "&END_PAGE=" . $arResult['END_PAGE_MORE'] . "&PAGEN_" . $arResult['NAV_RESULT']->NavNum . "=" . $arResult['END_PAGE_MORE'], array("PAGEN_" . $arResult['NAV_RESULT']->NavNum, "START_PAGE", "END_PAGE")),
                'args' => array('page' => $arResult['END_PAGE_MORE'], 'pagen' => $arResult['NAV_RESULT']->NavNum, 'count' => $arResult['FULL_COUNT'])
            )
        );
    }?>
    <?if ($arParams['IS_AJAX']) return;?>
    </div>
<?}?>