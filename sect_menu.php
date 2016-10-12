<div class="top-menu" <?if (!MAIN_PAGE && !ABOUT_PAGE) {?>style="background-image: url('<?$APPLICATION->ShowViewContent('header_image_replace')?>')"<?}?>>
    <div class="container">
        <a href="/" class="logo fll"><img src="<?=BXHelper::getResizedPictureByName(
                BXHelper::getHighloadValue(
                    'TemplateData', array('UF_CODE' => 'logo')
                ), array('width' => 200, 'height' => 200), BX_RESIZE_IMAGE_PROPORTIONAL)?>" width="60" height="42" alt=""/></a>

        <ul class="fll">
            <li><a href="/events/">Календарь событий</a></li>
            <li><a href="/programs/">программы</a></li>
            <li><a href="/articles/">статьи</a></li>
            <li><a href="/about/">о проекте</a></li>
            <li><a href="/contacts/">контакты</a></li>
        </ul>

        <div class="soc noanim flr">
            <a href="https://www.facebook.com/selfmamaforum/" title="Facebook" class="f"></a>
            <a href="https://vk.com/selfmamaforum" class="v" title="Вконтакте"></a>
            <a href="https://www.instagram.com/selfmamarussia/" title="Instagram" class="i"></a>
            <a href="https://flickr.com/photos/selfmama/"  title="Flickr" class="flickr"></a>
            <?/*<a href="#" class="t"></a>
            <a href="https://www.instagram.com/selfmamarussia/" class="i"></a>
            <a href="#" class="y"></a>*/?>

            <a href="#search" class="search fancy"></a>

        </div>

    </div>
    <div class="hide-block">
        <div class="container">
            <a class="fll" href="/"><img src="/static/images/mobile-logo.png" width="70" height="16" alt=""/></a>

            <div class="burger flr"></div>
        </div>
    </div>
</div>