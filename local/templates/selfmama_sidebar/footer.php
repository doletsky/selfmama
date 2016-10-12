<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
        <div class="right-part">
            <?
$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
    "AREA_FILE_SHOW" => "sect",
    "AREA_FILE_SUFFIX" => "sidebar",
    "AREA_FILE_RECURSIVE" => "Y"
), true
);
?>
        </div>
</div>
</div>
            <?
$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
    "AREA_FILE_SHOW" => "index",
    "AREA_FILE_SUFFIX" => "before_footer",
    "AREA_FILE_RECURSIVE" => "Y"
), true
);
?>
<?
if (file_exists(abs_path(DEFAULT_TEMPLATE_PATH) . '/common_template_parts/common_footer.php')) {
    require(abs_path(DEFAULT_TEMPLATE_PATH) . '/common_template_parts/common_footer.php');
}
?>