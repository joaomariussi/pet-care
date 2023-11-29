<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Throwable;

trait FileTrait
{
    /**
     * Salva a imagem
     * @param string $folder
     * @param UploadedFile $avatar
     * @return mixed
     * @throws Exception
     */
    public function imageUpload(
        string $folder,
        UploadedFile $avatar,
    ): string {
        try {
            return $this->generateImage($avatar, $folder);
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function generateImage($file, $folder): string
    {
        try {
            $filename = md5(microtime()) . '.webp';
            $small = Image::make($file)->widen(300)->encode('webp');
            Storage::disk('local_images')->put($folder/$filename, $small);
            return Storage::disk('local_images')->url($folder/$filename);
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function pdfUpload(
        string $folder,
        UploadedFile $fileUpload,
    ): string {
        try {
            $filename = md5(microtime()) . '.pdf';
            Storage::disk('public')->put($folder/$filename, $fileUpload);
            return Storage::disk('public')->url($folder/$filename);
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function saveLocal($pdf, $folder, $filename): array
    {
        try {
            //Cria o caminho para salvar o arquivo
            $destinationPath = public_path("imports/$folder");
            //Filename
//            $filenametostore = $filename . '_' . uniqid() . ".pdf";
            //Verifica se existe
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775, true);
            }
            //Salva no diretório
            $pdf->move($destinationPath, $filename);
            //Return
            return array("url" => "$destinationPath/$filename", "file_name" => $filename);
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }
}
