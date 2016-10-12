<?
foreach ($arResult['ITEMS'] as &$arItem) {
    $css_id = $arItem['RUNTIME_CSS_ID'] = $this->GetName().$arItem['ID'];
}

//$arResult['GROUPS'] = array_chunk_complex($arResult['ITEMS'], 2,3);


if (intval($arParams['START_PAGE'])) {
    $arResult['START_PAGE_MORE'] = $arParams['START_PAGE'];
} else {
    $arResult['START_PAGE_MORE'] = $arResult['NAV_RESULT']->NavPageNomer;
}

$arResult['END_PAGE_MORE'] = $arResult['NAV_RESULT']->NavPageNomer+1;
$arResult['NAVI'] = get_object_vars($arResult['NAV_RESULT']);
$arResult['FULL_COUNT'] = $arParams['LAST_COUNT']+count($arResult['ITEMS']);

if ($arResult['FULL_COUNT'] < $arResult['NAVI']['nSelectedCount']) {
    $arResult['MORE_LINK'] = Phery::link_to(
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

BXHelper::addCachedKeys($this->__component, array(
    'NAV_STRING',
    'START_PAGE_MORE',
    'END_PAGE_MORE',
    'NAVI',
    'FULL_COUNT',
    'GROUPS',
    'ITEMS',
    'MORE_LINK'
), $arResult);
?>