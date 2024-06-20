<?php

Namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

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
        $img_ = uniqid('anexo_').'.'.$file->getClientOriginalExtension();

        // Salvar a imagem na pasta específica
        $deu_certo = $file->storeAs('public/'.$local, $img_);

        if(!$deu_certo){
            throw new \Exception("Erro ao salvar o animal");
        }

        return $img_;
    }
    /**
     * Deleta o arquivo especificado do armazenamento.
     *
     * @param string|null $filePath
     * @return bool
     */
    public static function deletar($filePath)
    {
        if (!$filePath) {
            return false;
        }

        // Verifica se o arquivo existe antes de tentar deletá-lo
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            return true;
        }

        return false;
    }
}
