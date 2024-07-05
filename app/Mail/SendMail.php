<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use function Psy\debug;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @param array $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->subject($this->data['subject'])
            ->view($this->data['view'])
            ->with('data', $this->data);
    }

    /**
     * Método estático para enviar e-mail específico para aprovação de adoções.
     *
     * @param array $data
     * @return \Illuminate\Mail\Mailable
     */
    public static function analiseAdocoesEmail($data)
    {
        $viewData = [
            'subject' => $data['subject'],
            'view' => 'emails.analise_adocao',
            'body' => $data['body'], // Passa diretamente a mensagem como 'body'
            'adocaoId' => $data['adocaoId'], // Se necessário, passe outros dados separadamente
        ];


        if (isset($data['cpf_na_lista_negra'])) {
            $viewData['cpf_na_lista_negra'] = $data['cpf_na_lista_negra'];
        }

        return new static($viewData);
    }


    /**
     * Método estático para enviar e-mail específico para notificar que a solicitação de adoções vai ser vista pela equipe do Bartho.
     *
     * @param array $data
     * @return \Illuminate\Mail\Mailable
     */
    public static function notificaAdocoesAnaliseEmail($data)
    {
        return new static([
            'subject' => 'Análise de Adoção',
            'view' => 'emails.notifica_adocao_analise',
            'data' => $data,
        ]);
    }
}
