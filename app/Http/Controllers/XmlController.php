<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Xml;

class XmlController extends Controller
{	
    public function index()
    {
        $xmls = Xml::all();   

        return view('xml/list', compact('xmls'));
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
