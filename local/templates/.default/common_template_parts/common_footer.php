<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?global $APPLICATION;?>
<?$helpers = SelfmamaHelper::getInstance();?>
<?$APPLICATION->AddViewContent('runtime_css', $helpers->compileRuntimeCss());?>
<?$APPLICATION->ShowViewContent('page_wrapper_close');?>
<?
$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
        "AREA_FILE_SHOW" => "sect",
        "AREA_FILE_SUFFIX" => "before_footer",
        "AREA_FILE_RECURSIVE" => "Y",
    )
);
?>
<?
/*$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
        "AREA_FILE_SHOW" => "page",
        "AREA_FILE_SUFFIX" => "before_footer",
        "AREA_FILE_RECURSIVE" => "Y",
    )
);*/
?>

<div class="footer">
    <div class="container">
        <div class="top">
            <div class="ins">
                <p class="fll">
                    Подпишитесь
                    <br/>на обновления
                    <br/>Selfmama!
                </p>

                <div class="mail-form fll">
					<label>Подпишитесь на новости Selfmama!
                        <br/>Лучшие статьи, полезные советы и анонсы самых важных событий</label>

                    <div class="item" id="subscribe_2">
                        <?=Phery::form_for('/include/subscribe.php', 'subscribe_2');?>
                        <input placeholder="Ваш e-mail" type="text" name="email"/>
                        <button class="w-btn anim fll" type="submit">Подписаться</button>
                        </form>
                    </div>
                </div>

                <div class="write-us flr">
                    <span class="fw900">Хотите стать частью Selfmama?</span>

                    <a href="#write-us" class="w-btn fancy">Напишите нам</a>

                    <p>И мы обсудим условия нашего сотрудничества!</p>
                </div>
                <div class="clr"></div>
            </div>
        </div>
        <div class="bottom">
            <div class="copy fll">© 2016 Селфмама</div>

            <div class="made flr">
                Сделано в <a href="http://www.digitalmust.ru/">Digital Мастерская</a>
            </div>
        </div>
    </div>
</div>
</div>


<?
if ($APPLICATION->GetPageProperty('HEADER_CLASS') == 'inner-page') {
    $header_image = CStorage::getVar('header_image_replace');

    if (empty($header_image)) {
        $header_image = $helpers->getHeaderImageByUrlDirectory($APPLICATION->GetCurDir());
    }

    if (!empty($header_image)) {
        $APPLICATION->AddViewContent('header_image_replace', $header_image);
    } else {
        $APPLICATION->AddViewContent('header_image_replace', DEFAULT_HEADER_IMAGE);
    }
}

?>

<div id="search" class="popup">

    <form action="/search/" method="get" class="search-form">
        <div class="item">
            <input name="q" type="text"/>
            <button type="submit"></button>
        </div>

    </form>

</div>
<div id="write-us" class="popup">
    <div class="form" id="askform">
        <?$APPLICATION->IncludeFile("/include/askform.php", array('url' => $APPLICATION->GetCurPage()));?>
        <?/*<h3>Напишите нам</h3>
        <div class="item">
            <input class="error" name="name" placeholder="ваше имя" type="text"/>
        </div>

        <div class="item">
            <input name="email" placeholder="e-mail" type="text"/>
        </div>

        <div class="item">
            <textarea placeholder="сообщение" name="message"></textarea>
        </div>

        <button onclick="$.fancybox('#thanks',{padding: 0, margin: 40});" class="btn" type="submit">Отправить сообщение</button>*/?>
    </div>
</div>
    <div id="reg-me" class="popup">
        <div class="form" id="regform">
            <?$APPLICATION->IncludeFile("/include/regform.php", array('url' => $APPLICATION->GetCurPage()));?>
        </div>
    </div>
</body>
</html>