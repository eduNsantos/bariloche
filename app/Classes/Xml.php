<?php

namespace App\Classes;

class Xml {
    private $xml;
    private $numero;
    private $chave;
    private $emissao;
    private $fornecedor;
    private $total;
    private $type;
    private $path;
    private $finalidade;

    function __construct($xml)
    {   
        $this->setPath($xml);
        $xml = simplexml_load_file($xml);
        $this->setXml($xml);
        if ($this->xml["versao"] == "4.00") {
            // dd($xml);
            $emissao = $this->xml->NFe->infNFe->ide->dhEmi;
            $emissao = substr($emissao, 0, 10);
            $emissao = date_create($emissao);
            $emissao = date_format($emissao, 'd/m/Y');

            $total = $this->xml->NFe->infNFe->total->ICMSTot->vNF;
            $total = floatval($total);
            $total = number_format($total, 2, ',', '.');
            // dd($xml);

            $this->setNumero($this->xml->NFe->infNFe->ide->nNF);
            $this->setEmissao($emissao);
            $this->setChave($this->xml->protNFe->infProt->chNFe);
            $this->setFornecedor($this->xml->NFe->infNFe->emit->xNome);
            $this->setTotal($total);
            $this->setFinalidade((int)$this->xml->NFe->infNFe->ide->finNFe);
        } elseif ($xml["versao"] == "1.01") {
            $numNota = substr($this->xml->chNFe, 25, 9);
            $numNota = ltrim($numNota, '0');
            
            $total = $xml->vNF;
            $total = floatval($total);
            $total = number_format($total, 2, ',', '.');

            $emissao = $this->xml->dhEmi;
            $emissao = substr($emissao, 0, 10);
            $emissao = date_create($emissao);
            $emissao = date_format($emissao, 'd/m/Y');


            $this->setNumero($numNota);
            $this->setChave($this->xml->chNFe);
            $this->setEmissao($emissao);
            $this->setFornecedor($this->xml->xNome);
            $this->setTotal($total);
            $this->setFinalidade('-');
        }
    }

    public function getAll()
    {
        return $this;
    }


    /**
     * Get the value of xml
     */ 
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * Set the value of xml
     *
     * @return  self
     */ 
    
    public function setXml($xml)
    {
        $this->xml = $xml;

        return $this;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of chave
     */ 
    public function getChave()
    {
        return $this->chave;
    }

    /**
     * Set the value of chave
     *
     * @return  self
     */ 
    public function setChave($chave)
    {
        $this->chave = $chave;

        return $this;
    }

    /**
     * Get the value of emissao
     */ 
    public function getEmissao()
    {
        return $this->emissao;
    }

    /**
     * Set the value of emissao
     *
     * @return  self
     */ 
    public function setEmissao($emissao)
    {
        $this->emissao = $emissao;

        return $this;
    }

    /**
     * Get the value of fornecedor
     */ 
    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    /**
     * Set the value of fornecedor
     *
     * @return  self
     */ 
    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of path
     */ 
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @return  self
     */ 
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }


    /**
     * Get the value of finalidade
     */ 
    public function getFinalidade()
    {
        return $this->finalidade;
    }

    /**
     * Set the value of finalidade
     *
     * @return  self
     */ 
    public function setFinalidade($finalidade)
    {
        if (is_integer($finalidade)) {
            switch ($finalidade) {
                case 1:
                    $finalidade = 'Normal';
                    break;
                case 2:
                    $finalidade = 'Complementar';
                    break;
                case 3:
                    $finalidade = 'Complementar';
                    break;
                case 4:
                    $finalidade = 'Devolução';
                    break;
            }
        } 

        $this->finalidade = $finalidade;

        return $this;
    }
}