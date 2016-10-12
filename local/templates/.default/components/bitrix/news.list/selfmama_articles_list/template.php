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
    <div class="left-part">

        <div class="item articles anim">
            <div id="articles" class="wrapper">
                <h3>
                    <?if ($arParams['MAIN_PAGE']) {?><a href="<?=$arParams['SEF_FOLDER']?>"><?}?>
                        <span class="i i1"></span>
                        Новые статьи
                    <?if ($arParams['MAIN_PAGE']) {?></a><?}?>
                </h3>
                <?if ($arParams['IS_AJAX']) $APPLICATION->RestartBuffer();?>
    <?foreach ($arResult['ITEMS'] as $k => $arItem) {
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        $arCategory = $arResult['CATEGORIES'][$arItem['CAT_ID']]?>
                <a  href="<?=$arItem['DETAIL_PAGE_URL']?>" <?=$arItem['TARGET']?> style="background-image: url('<?=$arItem['DETAIL_PICTURE']['SRC']?>')" class="article <?=$arItem['CLASS']?>">
                    <span class="overlay"></span>
                        <span id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="info">
                            <span class="ins">
                            <span class="top">
                                <?/*<span class="tag fll" style="background: <?=$arCategory['PROPERTY_COLOR_VALUE']?>"><?=$arCategory['NAME']?></span>*/?>

                                <?if (empty($arItem['DISPLAY_PROPERTIES']['REMOTE_LINK']['VALUE'])) {?>
                                    <span class="likes fll">
                                        <span class="views fll"><?=$arItem['VIEWS']?></span>
                                        <span class="comments fll"><?=$arItem['COMMENTS']?></span>
                                    </span>
                                <?}?>
                            </span>
                                <div class="name"><?=$arItem['NAME']?></div>
                            <p><?=trim($arItem['PREVIEW_TEXT'])?></p>
                            </span>
                        </span>
                </a>
            <?
        }?>
            <?if (!$arParams['IS_AJAX']) {?></div><?}?>
            <?if ($arParams['MAIN_PAGE']) {?>
                <a href="<?=$arParams['SEF_FOLDER']?>" class="btn see-more no-bg">Смотреть все</a>
            <?} else {
                if ($arResult['FULL_COUNT'] < $arResult['NAVI']['nSelectedCount']) {
                    echo Phery::link_to(
                        'Показать еще',
                        'more',
                        array(
                            'class' => 'btn see-more no-bg',
                            'id' => 'pagination_' . $arResult['NAV_RESULT']->NavNum."_".$arResult['END_PAGE_MORE'],
                            'href' => $APPLICATION->GetCurPageParam("START_PAGE=" . $arResult['START_PAGE_MORE'] . "&END_PAGE=" . $arResult['END_PAGE_MORE'] . "&PAGEN_" . $arResult['NAV_RESULT']->NavNum . "=" . $arResult['END_PAGE_MORE'], array("PAGEN_" . $arResult['NAV_RESULT']->NavNum, "START_PAGE", "END_PAGE")),
                            'args' => array('page' => $arResult['END_PAGE_MORE'], 'pagen' => $arResult['NAV_RESULT']->NavNum, 'count' => $arResult['FULL_COUNT'])
                        )
                    );
                }
            }?>
            <?if ($arParams['IS_AJAX']) return;?>
        </div>
        <?if ($arParams['MAIN_PAGE']) {
            echo $arParams['~HIDE_EVENTS_HTML'];
            echo $arParams['~HIDE_PROGRAMS_HTML'];
            echo $arParams['~HIDE_BANNERS_HTML'];
            echo $arParams['~PHOTOS_HTML'];
            echo $arParams['~HIDE_VIDEO_HTML'];
        }?>
    </div>
<?}?>