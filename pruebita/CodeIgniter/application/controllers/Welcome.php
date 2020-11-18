<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public $empresa;
    public $description;
    public $titulo;


    public function __construct()
    {
        parent::__construct();

        $this->titulo = 'Ismodes....';
        $this->empresa = 'iSMOdES';
        $this->description = '';
        $this->img = base_url('app/images/logo.png');

    }

    public function index()
    {
        $data['meta']['titulo'] = $this->titulo;
        $data['meta']['description'] = $this->description;
        $data['meta']['site_name'] = $this->empresa;
        $data['meta']['img'] = $this->img;
                
        $data['noticias'] = $this->get_articles_by(3,5);
        
        $fitros=array();
        $filtros[]=new TFilter('fecha_visible','>',date('Y-m-d H:i:s'));
        $data['eventos'] = $this->get_articles_by(7,3,'fecha_visible','asc',$filtros);

        //$data['recent'] = $this->get_recent_articles(10);
        //$data['courses'] = $this->get_articles_by(1, 6);
        //$data['tutoriales'] = $this->get_articles_by(2, 3);
        // $data['contenido'] = $this->load->view('main', $data, true);

        $this->load->view('main', $data);
    }

    public function view_article($slug = '')
    {

        TTransaction::open('database');

        $items = ViewArticulo::where('slug', '=', $slug)->load();

        if (!$items) {
            $items = ViewArticulo::where('idarticulo', '=', $slug)->load();
        }

        if ($items)
        {
            foreach ($items as $item) {

                $data['articulo'] = $item;
                if (!file_exists(VIEWPATH.'/vistas/'.$item->plantilla.'.php'))
                {
                    $item->plantilla = 'default';
                }


                $data['titulo'] = $item->titulo . ' | ' . $this->empresa;
                $data['description'] = substr(strip_tags($item->contenido), 0, 500);
                $data['site_name'] = $this->empresa;
                $data['img'] = base_url('uploads/' . $item->image_head);
                $data['contenido'] = $this->load->view('vistas/'.$item->plantilla, $data, true);
                //$data['recent'] = $this->get_recent_articles();


                $this->load->view('layout', $data);
            }

        }else
        {
            $this->error_404();
        }
        TTransaction::close();
    }

    public function dia_a_dia($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $contenido['entradas'] = $this->get_articles_by(3);
            $this->load->view('noticias', $contenido);
        }else
        {
            $row = $this->get_articulo($slug);
            if ($row)
            {
                foreach ($row as $item) {

                    $data['articulo'] = $item;
                    $data['meta']['titulo'] = $item->titulo . ' | ' . $this->empresa;
                    $data['meta']['description'] = substr(strip_tags($item->contenido), 0, 500);
                    $data['meta']['site_name'] = $this->empresa;
                    $data['meta']['img'] = base_url('uploads/' . $item->image_head);
                    $data['img'] = base_url('uploads/' . $item->image_head);

                    $this->load->view('vistas/noticia_item', $data);
                }

            }else
            {
                $this->error_404();
            }
        }
    }

    public function plataforma($slug = FALSE)
    {
        if ($slug === FALSE)
        {

            $contenido['contenido'] = $this->get_articulo(13);//no borrar
            $contenido['entradas'] = $this->get_articles_by(6);
            $this->load->view('plataforma', $contenido);
        }else
        {
            $row = $this->get_articulo($slug);
            if ($row)
            {
                foreach ($row as $item) {

                    $data['articulo'] = $item;
                    $data['meta']['titulo'] = $item->titulo . ' | ' . $this->empresa;
                    $data['meta']['description'] = substr(strip_tags($item->contenido), 0, 500);
                    $data['meta']['site_name'] = $this->empresa;
                    $data['meta']['img'] = base_url('uploads/' . $item->image_head);
                    $data['img'] = base_url('uploads/' . $item->image_head);

                    $this->load->view('vistas/plataforma_item', $data);
                }

            }else
            {
                $this->error_404();
            }
        }
    }

    public function propuestas($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $contenido['entradas'] = $this->get_articles_by(4);
            $this->load->view('propuestas', $contenido);
        }else
        {
            $row = $this->get_articulo($slug);
            if ($row)
            {
                foreach ($row as $item) {

                    $data['articulo'] = $item;
                    $data['meta']['titulo'] = $item->titulo . ' | ' . $this->empresa;
                    $data['meta']['description'] = substr(strip_tags($item->contenido), 0, 500);
                    $data['meta']['site_name'] = $this->empresa;
                    $data['meta']['img'] = base_url('uploads/' . $item->image_head);
                    $data['img'] = base_url('uploads/' . $item->image_head);

                    $this->load->view('vistas/propuestas_item', $data);
                }

            }else
            {
                $this->error_404();
            }
        }
    }


    public function activismo()
    {
        $data['contenido'] = $this->get_articulo(15);
        $this->load->view('activismo', $data);
    }
    
    
    public function conoceme()
    {
        $this->load->view('conoceme', $data);
    }


    public function muestra_publicacion($slug = FALSE,$opcion)
    {
        //2 = solo contenido
        //4 == titulo en cabecera imagen (altura grande) + contenido
        //5 == titulo en cabecera imagen (altura pequeña) + contenido

        if ($slug !== FALSE)
        {
            $row = $this->get_articulo($slug);

            if ($row)
            {
                foreach ($row as $item) {

                    $data['contenido'] = $item;
                    $data['opcion'] = $opcion;

                    $data['meta']['titulo'] = $item->titulo . ' | ' . $this->empresa;
                    $data['meta']['description'] = substr(strip_tags($item->contenido), 0, 500);
                    $data['meta']['site_name'] = $this->empresa;
                    $data['meta']['img'] = base_url('uploads/' . $item->image_head);
                    $data['img'] = base_url('uploads/' . $item->image_head);

                    $this->load->view('vistas/vista_generica', $data);
                }
            }else
            {
                $this->error_404();
            }
        }else
        {
            $this->error_404();
        }
    }






    public function get_articulo($slug = '')
    {
        TTransaction::open('database');

        $items = ViewArticulo::where('slug', '=', $slug)->load();
        if (!$items) {
            $items = ViewArticulo::where('idarticulo', '=', $slug)->load();
        }
        TTransaction::close();

        return $items;
    }

    public function test()
    {
        echo VIEWPATH;
    }

    public function view_cursos($curso = '')
    {
        TTransaction::open('database');

        $titulo   = 'NUESTROS CURSOS';

        $criteria = new TCriteria;
        $param['order'] = 'idarticulo';
        $param['direction'] = 'desc';

        $criteria->setProperties($param);
        $criteria->setProperty('limit', 100);
        $criteria->add(new TFilter('categoria_id', '=', '1'));
        $criteria->add(new TFilter('tipo', '=', 'vista'));

        $items = new TRepository('ViewArticulo');
        $items = $items->load($criteria, false);

        TTransaction::close();

        if ($items) {
            $blog['titulo'] = $titulo;
            $blog['entradas'] = $items;

            $data['contenido'] = $this->load->view('view_curso', $blog, true);
        }

        $data['recent'] = $this->get_recent_articles();


        $data['titulo'] = $titulo . ' | ' . $this->empresa;
        $data['site_name'] = $this->empresa;
        $data['img'] = $this->img;
        $this->load->view('layout', $data);
    }



    public function view_blog($category = '')
    {
        TTransaction::open('database');

        $titulo   = 'BLOG ACADEMIA GAUSS';

        $criteria = new TCriteria;
        $param['order'] = 'idarticulo';
        $param['direction'] = 'desc';
        $criteria->setProperties($param);
        $criteria->setProperty('limit', 100);
        $criteria->add(new TFilter('tipo', '=', 'publicacion'));

        if ($category != '') {
            $criteria->add(new TFilter('categoria_denominacion', '=', $category));
            $titulo = strtoupper($category);
        }

        $items = new TRepository('ViewArticulo');
        $items = $items->load($criteria, false);

        TTransaction::close();


        if ($items) {

            $blog['titulo'] = $titulo;
            $blog['entradas'] = $items;

            $data['contenido'] = $this->load->view('view_blog', $blog, true);
        }

        $data['recent'] = $this->get_recent_articles();

        $data['titulo'] = $titulo . ' | ' . $this->empresa;
        $data['site_name'] = $this->empresa;
        $data['img'] = $this->img;
        $this->load->view('layout', $data);

    }

    private function get_articles_by($categoria = 1, $limit = 500,$order ='',$direction='',$filtros=array())
    {
    	if($order==''){
			$order='idarticulo';
		}
    	
    	if($direction==''){
			$direction='desc';
		}
    	
        TTransaction::open('database');

        $criteria = new TCriteria;
        
        $param['order'] = $order;
        $param['direction'] = $direction;
        $criteria->setProperties($param);
        $criteria->setProperty('limit', $limit);
        $criteria->add(new TFilter('categoria_id', '=', $categoria));

foreach($filtros as $filtro){
	$criteria->add($filtro);
}

        $items = new TRepository('ViewArticulo');
        $items = $items->load($criteria, false);


        TTransaction::close();

        if ($items) {
            return $items;
        }

        return $items;
    }

    private function get_recent_articles($limit = 5)
    {
        TTransaction::open('database');

        $criteria = new TCriteria;
        $param['order'] = 'idarticulo';
        $param['direction'] = 'desc';
        $criteria->setProperties($param);
        $criteria->setProperty('limit', $limit);
        $criteria->add(new TFilter('tipo', '=', 'publicacion'));

        $items = new TRepository('ViewArticulo');
        $items = $items->load($criteria, false);


        TTransaction::close();

        if ($items) {
            return $items;
        }

        return array();
    }

    public function clear()
    {
        $CI         = & get_instance();
        $path       = $CI->config->item('cache_path');

        $cache_path = ($path == '') ? APPPATH . 'cache/' : $path;

        $handle     = opendir($cache_path);
        while (($file = readdir($handle)) !== false) {
            //Leave the directory protection alone
            if ($file != '.htaccess' && $file != 'index.html') {
                @unlink($cache_path . '/' . $file);
            }
        }
        closedir($handle);
    }


    public function error_404()
    {
        $data['titulo'] = $this->titulo;
        $data['description'] = $this->description;
        $data['site_name'] = $this->empresa;
        $data['img'] = $this->img;


        $data['contenido'] = $this->load->view('error_404', $data, true);
        $this->load->view('layout', $data);
    }

}
