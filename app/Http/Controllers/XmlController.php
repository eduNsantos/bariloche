<?php

namespace App\Http\Controllers;

use App\Classes\Xml;
use Illuminate\Http\Request;
use App\Http\Controllers\FoldersController;

class XmlController extends Controller
{	
	private $xmls;

    public function index()
    {
		$folders = FoldersController::searchFilesInRootFolder();

		foreach ($folders as $folder) {
			$item = new Xml($folder);
			$this->setXmls($item);
		}
		
    	return view('index', [
			'xmls' => $this->xmls
		]);
    }


	/**
	 * Get the value of xmls
	 */ 
	public function getXmls()
	{
		return $this->xmls;
	}

	/**
	 * Set the value of xmls
	 *
	 * @return  self
	 */ 
	public function setXmls($xml)
	{
		$this->xmls[] = $xml;
	}
}
