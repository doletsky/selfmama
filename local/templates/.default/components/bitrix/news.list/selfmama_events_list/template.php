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
<div class="calendar">
<div class="other-programs anim">
    <div class="container">
        <h1>
            <span class="i <?=$arParams['LIST_ICON_CLASS']?>"></span>
            <?=$arParams['LIST_HEADER_TEXT']?>
        </h1>

        <div class="tabs noanim">
            <?=$arResult['PREV_LINK']?>
            <a class="<?=$arResult['ALL_ACTIVE']?>" href="<?=$arParams['ROOT_FOLDER'].$arParams['YEAR']."/"?>">Все</a>
            <a class="<?=$arResult['CURRENT_ACTIVE']?>" href="<?=$arParams['ROOT_FOLDER'].$arParams['YEAR']."/current/"?>">Текущие</a>
            <a class="<?=$arResult['PAST_ACTIVE']?>" href="<?=$arParams['ROOT_FOLDER'].$arParams['YEAR']."/past/"?>">Прошедшие</a>
            <a class="<?=$arResult['FUTURE_ACTIVE']?>" href="<?=$arParams['ROOT_FOLDER'].$arParams['YEAR']."/future/"?>">Будущие</a>
            <?=$arResult['NEXT_LINK']?>
        </div>
        <div class="wrap">
        <?if (!empty($arResult['ITEMS'])) foreach ($arResult['ITEMS'] as $k => $arItem) {
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $color = $arItem['DISPLAY_PROPERTIES']['LIST_COLOR']['VALUE'];?>
            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" <?=$arItem['TARGET']?> style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>')" class="article fll">
                <span class="overlay">



                    <span id="<?=$this->GetEditAreaId($arItem['ID'])?>" class="info">
                        <span class="ins">
                             <strong class="date" <?if (!empty($color)) {?>style="color: <?=$color?>" <?}?>>
                                 <?=$arItem['DISPLAY_DATE']?>
                             </strong>
                            <span class="name"><?=$arItem['NAME']?></span>
                            <span class="btn">
                                <?=GetMessage('REGISTER_MESSAGE')?>
                            </span>
                        </span>
                        <?/*<span class="top">

                            <span class="fw900 price fll" ><?=$arItem['DISPLAY_PRICE']?></span>


                            <?if (empty($arItem['DISPLAY_PROPERTIES']['REMOTE_LINK']['VALUE'])) {?>
                                <span class="likes fll">
                                    <span class="views fll"><?=$arItem['VIEWS']?></span>
                                    <span class="comments fll"><?=$arItem['COMMENTS']?></span>
                                </span>
                            <?}?>


                        </span>

                            <div class="name"><?=$arItem['NAME']?></div>*/?>
                    </span>
                </span>


            </a>
            <?if ((($k+1) % 3 == 0) && $k) {?>
                <div class="clr"></div>
            <?}?>
        <?} else if (!empty($arParams['NOT_FOUND_MESSAGE'])) {?>
            <div class="not-found-message"><?=$arParams['NOT_FOUND_MESSAGE']?></div>
        <?}?>
        </div>
        <div class="clr"></div>



        <?=$arResult['NAV_STRING']?>

    </div>
</div>
</div>