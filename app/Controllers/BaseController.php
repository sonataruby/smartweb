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
        
        $this->session->set('lang',$locale);
        
        //--------------------------------------------------------------------
        // Check for flashdata
        //--------------------------------------------------------------------
        $this->data['confirm'] = $this->session->getFlashdata('confirm');
        $this->data['errors'] = $this->session->getFlashdata('errors');
        $this->data['language'] = $this->session->get("lang");
        $this->data["settings"] = $this->getSettings();
        // Arguments to be used in the callback remap
        $segments = $request->uri->getSegments();
        $this->arguments = array_slice($segments, 2);
        $this->json_config = json_decode(file_get_contents(FCPATH."app.json")); 
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
            return view($this->data['body'], $this->data);
        }
        return $redirect;
    }

    public function getConfig($key="", $default=""){
        return $this->json_config->{$key} ? $this->json_config->{$key} : $default;
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
}
