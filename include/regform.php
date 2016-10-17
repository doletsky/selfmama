<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?

use PFBC\Element;
use PFBC\Form;


$form = new PheryForm();
$view = new PheryVertical();

$view->setPheryFunction('reg');
$form->configure(array(
    "prevent" => array("bootstrap", "jQuery", "focus"),
    "view" => $view,
));

$form->addElement(
    new Element\HTML("<h3>Зарегистрироваться</h3>")
);

$form->addElement(
    new Element\Textbox(
        false,
        "name",
        array(
            "placeholder" => "Ваше имя",
            "required" => true
        )
    )
);

$form->addElement(
    new Element\Hidden(
        false,
        "page",
        array(
            "value" => $url
        )
    )
);

$form->addElement(
    new Element\Textbox(
        false,
        "email",
        array(
            "placeholder" => "Ваш email",
            "required" => true
        )
    )
);
$form->addElement(
    new Element\Textarea(
        false,
        "message",
        array(
            "placeholder" => "сообщение"
        )
    )
);
$form->addElement(
    new Element\HTML("<button class=\"btn\" type=\"submit\">Отправить сообщение</button>")
);


if (Phery::is_ajax() && $_REQUEST['phery']['remote'] == 'reg') {
    global $APPLICATION;
    $APPLICATION->RestartBuffer();
    Phery::instance()->set(
        array(
            'reg' => function($ajax_data) use ($form){
                    global $_POST;
                    $form->setSubmitted();
                    $_POST = array_merge($_POST, $ajax_data);
                    if (!$form->isValid()) {
                        return PheryResponse::factory("#regform")->html($form->render(true));
                    } else {
                        $site_email = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'ask_email'));

                        if (!empty($site_email)) mail($site_email, "Selfmama: заполнена форма регистрации", $ajax_data['name']. "\r\n".$ajax_data['email']. "\r\n".$ajax_data['message'], 'From: Администратор Selfmama <selfmama@romanov.im>' . "\r\n");

                        return PheryResponse::factory("#regform")->html("<strong>Мы свяжемся с вами в ближайшее время.<br />Спасибо!</strong>");
                    }
                },
        )
    )->process();
}


$form->render();


?>