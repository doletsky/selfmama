<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
<?if (!empty($arResult['ITEMS'])) {?>
<ul class="root-comments">
    <?foreach ($arResult['ITEMS'] as $arItem) {
        renderItem($this, $arItem, $arResult['THREAD_TREES'], $arResult['ANSWERS'], $arResult['SOCIALS']);
        /*<li>
            <div class="ava fll">
                <img src="<?=$arItem['USER_AVATAR']?>" width="60" height="60" alt=""/>
            </div>

            <div class="inf">

                <div class="author">
                    <span class="fw900 name"><?=$arItem['USER_NAME']?></span>
                    <a href="<?=$arItem['USER_PROFILE_LINK']?>"><img src="<?=$arResult['SOCIALS'][$arItem['SOCIAL_ID']]['ICON']?>" width="18" height="18" alt=""/></a>
                    <strong class="date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></strong>
                </div>

                <p><?=$arItem['PREVIEW_TEXT']?></p>

                <a href="#" class="c-blue"><strong>Ответить</strong></a>
                <input type="hidden" name="thread_id" value="<?=$arItem['THREAD_ID']?>" />
                <input type="hidden" name="comment_id" value="<?=$arItem['ID']?>" />

            </div>
        </li>*/
    }?>
</ul>
<?}?>
<?
function renderItem($template, $arItem, $arThree, $arAnswers, $arSocials) {

//    $template->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
//    $template->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

    //$arItem['BITRIX_ID'] = $template->GetEditAreaId($arItem['ID']);
    global $USER;

    if (!empty($arSocials[$arItem['SOCIAL_ID']]['ICON'])) {
        $icon = $arSocials[$arItem['SOCIAL_ID']]['ICON'];
        $title = $arItem['USER_NAME'];
    } else {
        $icon = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'admin_ico'));
        $arItem['USER_PROFILE_LINK'] = "#";
        $title = "Администратор";
    }?>
    <li>
        <div class="ava fll">
            <img src="<?=$arItem['USER_AVATAR']?>" width="60" height="60" alt=""/>
        </div>

        <div class="inf">

            <div class="author">
                <span class="fw900 name"><?=$arItem['USER_NAME']?></span>
                <a href="<?=$arItem['USER_PROFILE_LINK']?>"><img src="<?=$icon?>" width="18" height="18" title="<?=$title?>"/></a>
                <strong class="date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></strong>
            </div>

            <p><?=$arItem['PREVIEW_TEXT']?></p>
            <?if ($USER->IsAdmin()) {?><a href="<?=preg_replace("/\&bxpublic\=Y/","",$arItem['EDIT_LINK'])?>" target="_blank">Редактировать</a><?}?>

            <a href="#" class="c-blue reply_to" data-active-text="Не отвечать" data-inactive-text="Ответить">
                <strong>Ответить</strong>
            </a>
            <input type="hidden" name="thread_id" value="<?=$arItem['THREAD_ID']?>" />
            <input type="hidden" name="comment_id" value="<?=$arItem['ID']?>" />
            <input type="hidden" name="reply_name" value="<?=$arItem['USER_NAME']?>" />

        </div><?
        if (!empty($arThree[$arItem['ID']])) {
            echo '<ul>';
            foreach ($arThree[$arItem['ID']] as $arAnswerId) {
                if (!empty($arAnswers[$arAnswerId])) {
                    renderItem($template, $arAnswers[$arAnswerId], $arThree, $arAnswers, $arSocials);
                }
            }
            echo '</ul>';
        }
        ?>
    </li>
    <?
}?>