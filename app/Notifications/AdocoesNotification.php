<?php

namespace App\Notifications;

use App\Helpers\EmailHelper;

class AdocoesNotification
{
    public function enviar($animal)
    {

        $email = array(
            'remetente' => 'desenvolvimento@bartho.org.br',
            'destinatario' => 'desenvolvimento@bartho.org.br',
            'assunto' => 'Assunto do E-mail',
            'mensagem' => '<p>Este é o corpo do e-mail em HTML.</p>'
        );
        EmailHelper::enviar($email['remetente'], $email['destinatario'], $email['assunto'], $email['mensagem']);

        return "E-mail enviado com sucesso!";
    }
}
