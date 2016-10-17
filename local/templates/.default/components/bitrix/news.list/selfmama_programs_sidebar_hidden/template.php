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
    $arCategories = $arResult['CATEGORIES'];?>
    <div class="item hide-courses courses">
		<h3><a href="/programs/">
                <span class="i i3"></span>
                Программы
            </a>
        </h3>
        <div class="block">
            <div class="inner">
            <?foreach ($arResult['ITEMS'] as $arItem) {?>
                <div id="<?=BXHelper::getEditAreaId($this,$arItem);?>" class="event">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="img fll">
                        <div class="team-img-wrapper">
                            <img src="<?=$arItem['DATA']['ICON']?>" width="68" height="68" alt=""/>
                        </div>
                    </a>

                    <div class="inf">
                        <strong style="color: <?=$arItem['DATA']['TEXT_COLOR']?>;" class="date">
                            <?=$arItem['DATA']['DATE']?>
                        </strong>

                        <a <?=$arItem['TARGET']?> href="<?=$arItem['DETAIL_PAGE_URL']?>" class="name">
                            <?=$arItem['DATA']['NAME']?>
                        </a>

                        <div class="links">
                            <div class="views fll"><?=$arItem['VIEWS']?></div>
                            <div class="subscribers fll"><?=$arItem['COMMENTS']?></div>
                        </div>

                        <?if(substr_count($arItem['DETAIL_PAGE_URL'], '#reg-me')>0):?>
                        <a href="#reg-me" class="btn fancy">
                            <?else:?>
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn">
                                <?endif?>
                            <?=GetMessage('REGISTER_MESSAGE')?>
                        </a>

                    </div>

                </div>
            <?}?>
            </div>
        </div>
        <?if (count($arResult['ITEMS']) > 1) {?>
            <div class="paginator paginator2"></div>
        <?}?>
    </div>
<?}?>