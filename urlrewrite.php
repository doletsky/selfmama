<?
$arUrlRewrite = array(
    array(
        "CONDITION" => "#^/events/(\d+)/(future|current|past)/.*#",
        "RULE" => "YEAR=$1&MODE=$2",
        "ID" => "bitrix:news",
        "PATH" => "/events/index.php",
    ),
    array(
        "CONDITION" => "#^/programs/(\d+)/(future|current|past)/.*#",
        "RULE" => "YEAR=$1&MODE=$2",
        "ID" => "bitrix:news",
        "PATH" => "/programs/index.php",
    ),
    array(
        "CONDITION" => "#^/events/(\d+)/.*#",
        "RULE" => "YEAR=$1",
        "ID" => "bitrix:news",
        "PATH" => "/events/index.php",
    ),
    array(
        "CONDITION" => "#^/programs/(\d+)/.*#",
        "RULE" => "YEAR=$1",
        "ID" => "bitrix:news",
        "PATH" => "/programs/index.php",
    ),
	array(
		"CONDITION" => "#^/events/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/events/index.php",
	),
	array(
		"CONDITION" => "#^/programs/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/programs/index.php",
	),
	array(
		"CONDITION" => "#^/articles/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/articles/index.php",
	),
);

?>