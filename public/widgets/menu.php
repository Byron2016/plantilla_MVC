<?php

class menuWidget extends Widget
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = $this->loadModel('menu');
    }
	public function getMenu($menu, $view, $inverse = null) 
	{

        $data['menu'] = $this->modelo->getMenu($menu);
        $data['inverse'] = $inverse;

        //se manda nombre de la vista (widget/views/menu-right.html) y el menu
        //

		return $this->render($view, $data);
	}

    public function getConfig($menu)
    {
        $menus['sidebar'] =  array(
            'position' => 'sidebar',
            'show'  => 'all',
            'hide' => array('inicio')
            //array('inicio', 'post') sitios donde queremos que se muestre
            // 'all' para todos los sitios
            // 'hide' => array('registro') donde queremos q se oculte
            
            );

        $menus['top'] =  array(
            'position' => 'top',
            'show'  => 'all'
        );

        return $menus[$menu];
    }
}