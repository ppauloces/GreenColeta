<?php


namespace Views;

class MainView
{
	private $fileName;
	private $header;
	private $footer;
	private $title;

	public $menuItens = array('Um', 'Dois', 'Tres');

	function __construct($fileName,$header = 'header', $footer='footer', $title = 'GrennColeta')
	{
		$this->fileName = $fileName;
		$this->header = $header;
		$this->footer = $footer;
		$this->title = $title;
	}

	public function render($arr = [])
	{
		$fullTitle = $this->title . " | " . strtoupper($this->fileName);
		include('pages/templates/'.$this->header.'.php');
		include('pages/'.$this->fileName.'.php');
		include('pages/templates/'.$this->footer.'.php');
	}
}