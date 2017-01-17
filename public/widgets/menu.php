<?php

class menuWidget extends Widget
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = $this->loadModel('menu');
    }
	public function getMenu() 
	{

        $data['menu'] = $this->modelo->getMenu();

        //se manda nombre de la vista (widget/views/menu-right.html) y el menu
        //
		return $this->render('menu-right',$data);
	}

    public function getConfig()
    {
        return array(
            'position' => 'sidebar',
            'show'  => 'all',
            'hide' => array('post')
            //array('inicio', 'post') sitios donde queremos que se muestre
            // 'all' para todos los sitios
            // 'hide' => array('registro') donde queremos q se oculte
            
            );
    }
}