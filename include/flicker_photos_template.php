<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?global $APPLICATION;?>
<?if (!empty($photos['GROUPS'])) {?>
    <div class="photo-gallery anim">
        <div id="photos" class="container">
            <h1>
                <span class="i i4"></span>
                Фото
            </h1>
            <?if ($is_ajax) $APPLICATION->RestartBuffer();?>
            <?foreach ($photos['GROUPS'] as $arGroup) {
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
                        ?>
                        <a href="<?=$arItem['filename']?>" class="<?=$item_class?> fancy">
                    <span style="background-image: url('<?=$arItem['filename']?>');" class="img">
                        <span class="info">
                            <div class="name"></div>
                        </span>
                    </span>
                        </a>
                    <?}?>
                    <div class="clr"></div>
                </div>
            <?}?>
            <?/*<div id="<?='pagination_' . $arResult['NAV_RESULT']->NavNum."_".$arResult['END_PAGE_MORE']?>" class="items">*/?>
                <?if ($page < $page_num) {
                    echo Phery::link_to(
                        'Показать еще',
                        'more',
                        array(
                            'class' => 'btn see-more no-bg',
                            'href' => "?page=".$page,
                            'args' => array('page' => $page)
                        )
                    );
                }?>
            <?if ($is_ajax) return;?>
        </div>
    </div>
<?}?>