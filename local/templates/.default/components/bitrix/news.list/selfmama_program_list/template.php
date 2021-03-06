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
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="other-programs anim">
        <div class="container">
            <h1>
                <span class="i i2"></span>
                Календарь событий
            </h1>

            <div class="tabs noanim">
                <?=$arResult['PREV_LINK']?>
                <a class="<?=$arResult['ALL_ACTIVE']?>" href="<?=$arParams['ROOT_FOLDER'].$arParams['YEAR']."/"?>">Все</a>
                <a class="<?=$arResult['CURRENT_ACTIVE']?>" href="<?=$arParams['ROOT_FOLDER'].$arParams['YEAR']."/current/"?>">Текущие</a>
                <a class="<?=$arResult['PAST_ACTIVE']?>" href="<?=$arParams['ROOT_FOLDER'].$arParams['YEAR']."/past/"?>">Прошедшие</a>
                <a class="<?=$arResult['FUTURE_ACTIVE']?>" href="<?=$arParams['ROOT_FOLDER'].$arParams['YEAR']."/future/"?>">Будущие</a>
                <?=$arResult['NEXT_LINK']?>
            </div>

            <?foreach ($arResult['ITEMS'] as $k => $arItem) {
                $color = $arItem['DISPLAY_PROPERTIES']['LIST_COLOR']['VALUE'];?>
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>" style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>')" class="article fll">
                    <span class="overlay">

                    <span class="info">
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

                            <span class="fw900 price fll" <?if (!empty($color)) {?>style="color: <?=$color?>" <?}?>><?=$arItem['DISPLAY_PRICE']?></span>


<!--                            <span class="likes fll">-->
<!--                                <span class="views fll">--><?//=$arItem['VIEWS']?><!--</span>-->
<!--                                <span class="comments fll">--><?//=$arItem['COMMENTS']?><!--</span>-->
<!--                            </span>-->


                        </span>

                            <div class="name"><?=$arItem['NAME']?></div>

                       <span class="btn">
                           <?=GetMessage('REGISTER_MESSAGE')?>
                       </span>*/?>
                    </span>
                    </span>


                </a>
                <?if ((($k+1) % 3 == 0) && $k) {?>
                    <div class="clr"></div>
                <?}?>
            <?}?>
            <div class="clr"></div>



            <?=$arResult['NAV_STRING']?>

        </div>
    </div>
<?}?>