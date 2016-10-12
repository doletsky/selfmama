<script src="//ulogin.ru/js/ulogin.js"></script>
<div id="uLogin_20d73698" data-uloginid="20d73698" data-ulogin="display=small;fields=email,first_name,photo_big,photo,sex,last_name;providers=vkontakte,odnoklassniki,mailru,facebook,google,linkedin,twitter,livejournal;redirect_uri=<?=$actual_link?>"></div>

<script>

    uLogin.setStateListener("uLogin_20d73698", "ready", function(){
        $('.ulogin-dropdown-button').remove();
    });
</script>