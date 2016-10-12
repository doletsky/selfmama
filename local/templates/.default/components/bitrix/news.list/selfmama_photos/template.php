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
<?if (!empty($arResult['GROUPS'])) {?>
<div class="photo-gallery anim">
    <div id="photos" class="container">
        <h1>
            <span class="i i4"></span>
            Фото
        </h1>
        <?if ($arParams['IS_AJAX']) $APPLICATION->RestartBuffer();?>
        <?foreach ($arResult['GROUPS'] as $arGroup) {
            if (count($arGroup) == 2) {
                $class = "double";
                tick($d);
            } else {
                $class = "triple";
            }?>
        <div class="row <?=$class?>">
            <?foreach ($arGroup as $arItem) {
                if ($class == "double") {
                    tick($i);
                    //считаем четные тики.
                    // $i - тик для итемов. Считается только если сейчас идет двойной ряд.
                    // $d - тик для двойных рядов
                    if (($i && $d) || (!$i && !$d) ) {
                        $item_class = "big ";
                    } else {
                        $item_class = "small ";
                    }
                } else {
                    $item_class = "";
                }

                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <a href="<?=$arItem['DETAIL_PICTURE']['SRC']?>" class="<?=$item_class?> fancy">
                    <span id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>');" class="img">
                        <span id="<?=$arItem['RUNTIME_CSS_ID']?>" class="info">
                            <div class="name"><?=$arItem['NAME']?></div>
                        </span>
                    </span>
                </a>
            <?}?>
            <div class="clr"></div>
        </div>
        <?}?>

        <div id="<?='pagination_' . $arResult['NAV_RESULT']->NavNum."_".$arResult['END_PAGE_MORE']?>" class="items">
            <?if ($arResult['FULL_COUNT'] < $arResult['NAVI']['nSelectedCount']) {
                echo Phery::link_to(
                    'Показать еще',
                    'more',
                    array(
                        'class' => 'btn see-more no-bg',
                        'href' => $APPLICATION->GetCurPageParam("START_PAGE=" . $arResult['START_PAGE_MORE'] . "&END_PAGE=" . $arResult['END_PAGE_MORE'] . "&PAGEN_" . $arResult['NAV_RESULT']->NavNum . "=" . $arResult['END_PAGE_MORE'], array("PAGEN_" . $arResult['NAV_RESULT']->NavNum, "START_PAGE", "END_PAGE")),
                        'args' => array('page' => $arResult['END_PAGE_MORE'], 'pagen' => $arResult['NAV_RESULT']->NavNum, 'count' => $arResult['FULL_COUNT'])
                    )
                );
            }?>
        </div>
        <?if ($arParams['IS_AJAX']) return;?>
    </div>
</div>
<?}?>