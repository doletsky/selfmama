<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if (Phery::is_ajax() && ($_REQUEST['phery']['remote'] == 'subscribe_1' || $_REQUEST['phery']['remote'] == 'subscribe_2')) {
    Phery::instance()->set(
        array(
            'subscribe_1' => function($ajax_data){

                /*$campaign_id = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'subscribe_campaign_token'));
                $api_key = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'subscribe_api_key'));
                $success_text = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'subscribe_success'));

                $getResponse = new GetResponse($api_key);
                $response = $getResponse->addContact($campaign_id, $ajax_data['email'], $ajax_data['email']);

                $response = json_decode(json_encode($response), true);
                $text = "Спасибо за подписку";
                if ($response['queued']) {
                    $text = $success_text;
                } else if (isset($response['queued'])) {
                    $text = $response['queued'];
                }*/



                $list_id = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'subscribe_list_id'));
                $api_key = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'subscribe_api_key'));
                $success_text = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'subscribe_success'));


                $wrap = new CS_REST_Subscribers($list_id, array('api_key' => $api_key));
                $response = $wrap->add(array(
                    'EmailAddress' => $ajax_data['email'],
                    'Name' => $ajax_data['email'],
                ));


                if ($response->was_successful()) {
                    $text = $success_text;
                } else {
                    $vars = array_change_key_case(get_object_vars($response->response), CASE_LOWER);
                    if ($vars['code'] = 1) {
                        $text = 'Невалидный email';
                    } else {
                        $text = "Произошла ошибка. ".$vars['message'];
                    }
                }

                return PheryResponse::factory("#subscribe_1")->html("<strong>".$text."</strong>")/*->script(DeepSoundHelpers::getPushStateScript())*/;
            },
            'subscribe_2' => function($ajax_data){

                /*$campaign_id = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'subscribe_campaign_token'));
                $api_key = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'subscribe_api_key'));
                $success_text = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'subscribe_success'));

                $getResponse = new GetResponse($api_key);
                $response = $getResponse->addContact($campaign_id, $ajax_data['email'], $ajax_data['email']);

                $response = json_decode(json_encode($response), true);
                $text = "Спасибо за подписку";
                if ($response['queued']) {
                    $text = $success_text;
                } else if (isset($response['queued'])) {
                    $text = $response['queued'];
                }*/



                $list_id = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'subscribe_list_id'));
                $api_key = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'subscribe_api_key'));
                $success_text = BXHelper::getHighloadValue('TemplateData', array('UF_CODE' => 'subscribe_success'));


                $wrap = new CS_REST_Subscribers($list_id, array('api_key' => $api_key));
                $response = $wrap->add(array(
                    'EmailAddress' => $ajax_data['email'],
                    'Name' => $ajax_data['email'],
                ));


                if ($response->was_successful()) {
                    $text = $success_text;
                } else {
                    $vars = array_change_key_case(get_object_vars($response->response), CASE_LOWER);
                    if ($vars['code'] = 1) {
                        $text = 'Невалидный email';
                    } else {
                        $text = "Произошла ошибка. ".$vars['message'];
                    }
                }

                return PheryResponse::factory("#subscribe_2")->html("<strong>".$text."</strong>")/*->script(DeepSoundHelpers::getPushStateScript())*/;
            },
        )
    )->process();
}?>