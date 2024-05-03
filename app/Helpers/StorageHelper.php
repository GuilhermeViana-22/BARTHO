<?php

Namespace App\Helpers;

Class StorageHelper
{

    /**
     * Método facil para realizar um save no STORAGE
     *
     * @param $file
     * @param $local
     * @return string
     * @throws \Exception
     */
    public static function salvar( $file, $local )
    {
        $img_ = uniqid('img_').'.'.$file->getClientOriginalExtension();;

        // Salvar a imagem na pasta específica
        $deu_certo = $file->storeAs($local, $img_);

        if(!$deu_certo){
            throw new \Exception("Erro ao salvar o animal");
        }

        return $img_;
    }

}
