<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?global $USER;?>
<?$arAnswersId = array();?>
<?$arUsersId = array();?>
<?foreach ($arResult['ITEMS'] as $arCommentItem) {
    if (is_array($arCommentItem['DISPLAY_PROPERTIES']['THREAD']['VALUE'])) {
        $arAnswersId = array_merge($arAnswersId, $arCommentItem['DISPLAY_PROPERTIES']['THREAD']['VALUE']);
    }

    $arUsersId[] = $arCommentItem['DISPLAY_PROPERTIES']['USER']['VALUE'];
}
?>
<?$arSocials = BXHelper::getElements(array(), array('IBLOCK_ID' => 9), false, false, array("*"), true, 'ID');?>
<?$arAnswers = BXHelper::getElements(array(), array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ID' => $arAnswersId), false, false, array("*"), false, 'ID');?>

<?$arAnswers = $arAnswers['RESULT'];?>
<?$arSocials = $arSocials['RESULT'];?>
<?foreach ($arSocials as &$arSoc) {
    $arSoc['ICON'] = BXHelper::getResizedPictureByID($arSoc['PROPERTIES']['ICON']['VALUE'], array('width' => 50, 'height' => 50), BX_RESIZE_IMAGE_EXACT);
}?>
<?foreach ($arAnswers as $k => $arAns) {

    $arButtons = CIBlock::GetPanelButtons(
        $arAns["IBLOCK_ID"],
        $arAns["ID"],
        0,
        array("SECTION_BUTTONS"=>false, "SESSID"=>false)
    );
    $arAnswers[$k]["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];

    $arUserAnswersId[] = $arAns['PROPERTIES']['USER']['VALUE'];
}?>
<?$arUsersId = array_merge($arUsersId, $arUserAnswersId);?>

<?$by = 'ID';?>
<?$order = 'ASC';?>

<?$dbResult = $USER->GetList(
    $by,
    $order,
    array('ID' => implode(" | ", $arUsersId)),
    array(
        'SELECT' => array('UF_OAUTH_LINK', 'UF_AVATARS'),
        'FIELDS' => array('ID', 'LOGIN','NAME','LAST_NAME')
    )
);

$arResult['USERS'] = array();

while ($next = $dbResult->GetNext()) {
    $next['DISPLAY_NAME'] = BXHelper::getUserDisplayName($next['ID'], array($next['ID'] => $next));

    foreach ($next['UF_OAUTH_LINK'] as $auth_link) {
        $auth_link = explode(",", $auth_link);
        $next['ACCOUNTS'][$auth_link[0]] = $auth_link[1];
    }

    foreach ($next['UF_AVATARS'] as $ava_link) {
        $ava_link = explode(",", $ava_link);
        $next['AVATARS'][$ava_link[0]] = $ava_link[1];
    }

    $arResult['USERS'][$next['ID']] = $next;
}



foreach ($arResult['ITEMS'] as &$arItem) {
    $social = current($arItem['DISPLAY_PROPERTIES']['SOCIAL']['LINK_ELEMENT_VALUE']);
    $arItem['SOCIAL_NAME'] = $social['CODE'];
    $arItem['SOCIAL_ID'] = $social['ID'];
    $arItem['USER_ID'] = $arItem['DISPLAY_PROPERTIES']['USER']['VALUE'];

    $arItem['USER_PROFILE_LINK'] = $arResult['USERS'][$arItem['USER_ID']]['ACCOUNTS'][$arItem['SOCIAL_NAME']];
    $arItem['USER_AVATAR'] = $arResult['USERS'][$arItem['USER_ID']]['AVATARS'][$arItem['SOCIAL_NAME']];
    if (empty($arItem['USER_AVATAR'])) {
        $arItem['USER_AVATAR'] = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'empty_photo'));
    }
    $arItem['USER_NAME'] = $arResult['USERS'][$arItem['USER_ID']]['DISPLAY_NAME'];
}

foreach ($arAnswers as &$arAnswer) {
    $arAnswer['SOCIAL_NAME'] = $arSocials[$arAnswer['PROPERTIES']['SOCIAL']['VALUE']]['CODE'];
    $arAnswer['SOCIAL_ID'] = $arAnswer['PROPERTIES']['SOCIAL']['VALUE'];
    $arAnswer['USER_ID'] = $arAnswer['PROPERTIES']['USER']['VALUE'];

    $arAnswer['USER_PROFILE_LINK'] = $arResult['USERS'][$arAnswer['USER_ID']]['ACCOUNTS'][$arAnswer['SOCIAL_NAME']];
    $arAnswer['USER_AVATAR'] = $arResult['USERS'][$arAnswer['USER_ID']]['AVATARS'][$arAnswer['SOCIAL_NAME']];
    if (empty($arAnswer['USER_AVATAR'])) {
        $arAnswer['USER_AVATAR'] = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'empty_photo'));
    }
    $arAnswer['USER_NAME'] = $arResult['USERS'][$arAnswer['USER_ID']]['DISPLAY_NAME'];
}


$arResult['ITEMS'] = array_map(function ($arComment) {
    $arComment['THREAD_ID'] = $arComment['ID'];
    $arComment['IS_ROOT'] = true;
    $arComment['ANSWERS_ID'] = $arComment['DISPLAY_PROPERTIES']['ANSWERS']['VALUE'];
    return $arComment;
}, $arResult['ITEMS']);


foreach ($arAnswers as &$arAnswer) {
    $arAnswer['IS_ROOT'] = false;
    $arAnswer['ANSWERS_ID'] = $arAnswer['PROPERTIES']['ANSWERS']['VALUE'];
    foreach ($arResult['ITEMS'] as $arThread) {
        if (in_array($arAnswer['ID'], $arThread['DISPLAY_PROPERTIES']['THREAD']['VALUE'])) {
            $arAnswer['THREAD_ID'] = $arThread['ID'];
        }
    }
}

$arTempComments = array_merge(array_values($arAnswers), $arResult['ITEMS']);

$thread_trees = array();

foreach ($arTempComments as $k => $cmnt) {
    $thread_trees[$cmnt['ID']] = $cmnt['ANSWERS_ID'];
}

$arResult['THREAD_TREES'] = $thread_trees;
$arResult['ANSWERS'] = $arAnswers;
$arResult['SOCIALS'] = $arSocials;

?>