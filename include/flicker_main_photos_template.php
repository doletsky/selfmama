<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?
global $APPLICATION;

if (!empty($photos['GROUPS'])) {
    $paginator = "";?>
    <div class="item photos">
        <h3>
            <?if ($main_page) {?><a href="<?=$sef_folder?>"><?}?>
                <span class="i i4"></span>
                Фото
                <?if ($main_page) {?></a><?}?>
        </h3>
        <div <?if ($border_color) {?> style="background-color: <?=$border_color?>" <?}?>class="gallery">
            <div class="inner">
                <?foreach ($photos['GROUPS'] as $k => $arGroup) {
                    $paginator .= "<a class=\"".(!$k ? "active" : "")."\" href=\"#gal".$k."\"><span></span></a>"?>
                    <div id="gal<?=$k?>" <?if (!$k) {?>style="display: block;"<?}?> class="area">
                        <ul>
                            <li>
                            <?foreach ($arGroup as $arItem) {?>
                                    <a class="anim fancy" href="<?=$arItem['filename']?>">
                                    <span style="background-image: url('<?=$arItem['thumb']?>')" class="hover">
                                        <span class="over">
                                            <div class="name">
                                            </div>
                                        </span>
                                    </span>
                                    </a>
                            <?}?>
                            </li>
                        </ul>
                    </div>
                <?}?>
            </div>


            <?if (count($photos['GROUPS']) > 1) {?>
                <div class="paginator paginator1">
                    <?=$paginator?>
                </div>
            <?}?>
        </div>
    </div>
<?}?>