<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoldersController extends Controller
{
    const ROOT_FOLDER = 'C:\GBS-EGIS\Exe\Downloads\\';

    private $monthFolders;
    private $notCreatedFolders = array();
    private $status;
    private $message;


    function __construct()
    {
        $this->setMonthFolders([
            '01_JAN',
            '02_FEV',
            '03_MAR',
            '04_ABR',
            '05_MAI',
            '06_JUN',
            '07_JUL',
            '08_AGO',
            '09_SET',
            '10_OUT',
            '11_NOV',
            '12_DEZ',
        ]);
    }

    /**
     * searchAllFiles
     *
     * @return array
     */
    public static function searchAllFiles(): array
    {
        $files = scandir(self::ROOT_FOLDER);
        $allFiles = [];
        $folders = [self::ROOT_FOLDER];
        $folderCounter = 1;
        for ($i = 0; $i < $folderCounter; $i++) {
            $files = scandir($folders[$i]);
            foreach ($files as $file) {
                if ($file != ".." && $file != ".") {
                    $filePath = $folders[$i] . '\\' . $file;
                    $fileType = filetype($filePath);
                    if ($fileType == "dir") {
                        $folderCounter++;
                        $folders[] = $filePath;
                    }
                    
                    if($fileType == "file" && substr($file, -4) == ".xml") {
                        $allFiles[$file] = $filePath;
                    }
                }
            }
        }

        return $allFiles;
    }

    public static function searchFilesInRootFolder(): array
    {
        $allFiles = [];
        foreach ($files as $file) {
            $filePath = self::ROOT_FOLDER . '\\' . $file;
            if (filetype($file) == "file") {
                $allFiles[$file] = $filePath;
            }
        }

        return $allFiles;
    }
    
    /**
     * Cria todas as pastas de meses e quinzenas
     *
     * @return void
     */
    public function createAllFolders()
    {
        foreach ($this->monthFolders as $pasta) {
            $pastaAtual = self::ROOT_FOLDER.'\\'.$pasta;
            $this->createFolder($pastaAtual, $pasta);

            $mes = substr($pasta, 0, 2);
            for ($i = 1; $i <= 2; $i++) {
                $nome = 'NFE_ENTRADA_'.$mes.'_19_'.$i.'ª Quinzena';
                $this->createFolder($pastaAtual.'/'.$nome, $nome);
            }
        }
        
        $this->checkNotCreatedFolders();

        return Response()->json([
            'status' => $this->status,
            'message' => $this->message,
            'pastas' => $this->notCreatedFolders
        ]);
    }

    /**
     * createFolder
     *
     * @param  mixed $pastaAtual
     * @param  mixed $pasta
     *
     * @return bool
     */
    private function createFolder($pastaAtual, $pasta) : bool
    {
        if (file_exists($pastaAtual)) {
            $this->setNotCreatedFolders($pasta);
            $status = false;
        } else {
            mkdir($pastaAtual, 0777);
            $status = true;
        }

        return $status;
    }


    /**
     * checkNotCreatedFolders
     *
     * @return void
     */
    public function checkNotCreatedFolders()
    {
        if (empty($this->notCreatedFolders)) {
            $this->setStatus('1');
            $this->setMessage('Pastas criadas com sucesso!');
        } else {
            $this->setStatus('2');
            $this->setMessage('Algumas pastas já foram criadas anteriormente.');
        }

        return $this->getStatus();
    }

    /**
     * Pega o valor de todas as pastas dos meses
     */ 
    public function getMonthFolders()
    {
        return $this->monthFolders;
    }

    /**
     * Set the value of months
     *
     * @return  self
     */ 
    public function setMonthFolders(array $months)
    {
        $this->monthFolders = $months;
    }

    /**
     * Get the value of notCreatedFolders
     */ 
    public function getNotCreatedFolders(iterable $item = null)
    {
        return $item == null ? $this->notCreatedFolders : $this->notCreatedFolders[$item];
    }

    /**
     * Set the value of notCreatedFolders
     *
     * @return  self
     */ 
    public function setNotCreatedFolders($notCreatedFolders)
    {
        $this->notCreatedFolders[] = $notCreatedFolders;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}
