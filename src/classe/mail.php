<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;

class Mail
{
    private $api_key = 'ef6ce49acbaa177b4e1bc45404f94a26';
    private $api_key_secret = '336e134868c150c879a19e98808419ed';

    public function send($destinataires, $to_name, $subject, $content)
    {


        $mj = new Client($this->api_key, $this->api_key_secret,true,['version' => 'v3.1']);
      
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => 'ajustinmarie@outlook.fr',
                        'Name' => 'Expéditeur'
                    ],
                    'To' => $destinataires,
                    'Subject' => 'Mon premier mail',
                    'TextPart' => 'J\'espère que vous allez bien.',
                    'HTMLPart' => '<p>J\'espère que vous allez bien.</p>'
                ]
            ]
        ];

        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success() && dd($response->getData());
    }
}