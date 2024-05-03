<?php

Namespace App\Helpers;

Class Retorno
{
    public static function redirecionaErro(string $to, string $message)
    {
        return redirect($to)->with('message_error', $message);
    }

    public static function redirecionaSucesso(string $to, string $message)
    {
        return redirect($to)->with('message_success', $message);
    }

    public static function deVoltaSucesso( string $message)
    {
        return back()->with('message_success', $message);
    }

    public static function deVoltaErro( string $message)
    {
        return back()->with('message_error', $message);
    }
}
