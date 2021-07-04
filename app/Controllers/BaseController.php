<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ["url","form","functions"];
    protected $view = null; // Set default yield view
    protected $data = []; // Set default data array
    protected $layout = 'layout/application'; // Set default layout
    protected $arguments = []; // arguments that will be sent to the methods
    protected $json_config;
    protected $settings;
    public $is_home = false;
	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
		$this->session = \Config\Services::session();
        $locale = $_GET['language'] ? $_GET['language'] : "en";
        
        if(!$this->session->has('lang') || ($locale != $this->session->get("lang") && $_GET['language'] != "")) {
            $this->session->set('lang',$locale);
            echo '<script>window.location="'.previous_url().'";</script>';
            exit();

        }
        $this->data['language'] = $this->session->get("lang");
        $this->data["supportlangauge"] = ["en" => "EN"];
        
        //--------------------------------------------------------------------
        // Check for flashdata
        //--------------------------------------------------------------------
        $this->data['confirm'] = $this->session->getFlashdata('confirm');
        $this->data['errors'] = $this->session->getFlashdata('errors');
        
        
        // Arguments to be used in the callback remap
        $segments = $request->uri->getSegments();
        $this->arguments = array_slice($segments, 2);

        if($segments[0] != "install") {
            $this->settings = $this->getSettings();
            $this->data["settings"] = $this->settings;
           
        }
        $slang = explode("|",$this->data["settings"]->mutile_lang);
        $langsupport = [];
        if(is_array($slang)){
            foreach ($slang as $key => $value) {
                list($k,$val) = explode("=",$value);
                $langsupport[$k] = $val;
            }
        }
       

        $this->data["supportlangauge"] = array_merge($this->data["supportlangauge"],$langsupport);
        if(file_exists(FCPATH.$this->getTemplates($this->layout))){
            $this->layout = $this->getTemplates($this->layout);
        }

	}
	public function _remap($method = null)
    {
        $router = service('router');
        $controller_full_name = explode('\\', $router->controllerName());
        $view_folder = strtolower(end($controller_full_name));
       
        //Checks if it's a 404 or not
        if (method_exists($this, $method)) {
            $redirect = call_user_func_array(array($this, $method), $this->arguments);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        //Check if it's a redirect or not
        if (isset($redirect) && is_object($redirect) && get_class($redirect) === 'CodeIgniter\HTTP\RedirectResponse') {
            
            return $redirect;
        }
        
        $this->data["is_home"] = $this->is_home;

        if ($this->view !== false) {
            //print_r($this->layout);
            $this->data['layout'] = (empty($this->layout)) ? 'layout/application' : $this->layout;
            $this->data['body'] = (!empty($this->view)) ? $this->view : strtolower($view_folder . '/' . $router->methodName());
            return $this->minify_HTML(view($this->data['body'], $this->data));
        }

        return $redirect;
    }

    public function getTemplates($src){
        return getenv("templates");
    }

    public function setIsHome(){
        $this->is_home = true;
    }

    public function getSettings(){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM settings where language='".$this->data['language']."' OR  language='' ORDER BY id ASC")->getResult();
        $arv = new \stdClass;
        foreach ($query as $key => $value) {
            $arv->{$value->name} = $value->value;
        }
        //$arv->is_home = $this->is_home;

        return $arv;
    }

    public function setSEO($arv=[]){
        foreach ($arv as $key => $value) {
            if($key == "keyword" && !empty($value)){
                $this->settings->site_keywords = $value;
            }

            if($key == "description" && !empty($value)){
                $this->settings->site_description = $value;
            }

            if($key == "title" && !empty($value)){
                $this->settings->site_name = $value . " | ". $this->settings->site_name;
            }
            if($key == "image"){
                $this->settings->site_banner = $value;
            }
            
        }
    }


    public function minify_HTML($html)
    {
        
            

       $search = array(
        '/(\n|^)(\x20+|\t)/',
        '/(\n|^)\/\/(.*?)(\n|$)/',
        '/\n/',
        '/\<\!--.*?-->/',
        '/(\x20+|\t)/', # Delete multispace (Without \n)
        '/\>\s+\</', # strip whitespaces between tags
        '/(\"|\')\s+\>/', # strip whitespaces between quotation ("') and end tags
        '/=\s+(\"|\')/'); # strip whitespaces between = "'

       $replace = array(
        "\n",
        "\n",
        " ",
        "",
        " ",
        "><",
        "$1>",
        "=$1");

        $html = str_replace("\n","",preg_replace($search,$replace,$html));
        return $html;
    }
}
