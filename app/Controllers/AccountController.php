<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Libraries\Users;
use App\Libraries\Breadcrumb;
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

class AccountController extends BaseController
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
	protected $helpers = ["url","form","functions","text"];
    protected $view = null; // Set default yield view
    protected $data = []; // Set default data array
    protected $layout = 'layout/cpanel'; // Set default layout
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
        //$this->data['language'] = $this->session->has("lang") ? $this->session->get("lang") : "en";
        //$this->request->setLocale($this->data['language']);
		$this->layout = $this->getTemplates();
        $this->breadcrumb = new Breadcrumb();

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
        
        if(!$this->session->has('userlogin') ){
        	echo '<script>window.location="/account/login?return='.current_url().'";</script>';
            exit();
        }
       
        $this->data["user"] = $this->user->getSession();
        if ($this->view !== false) {
            //print_r($this->layout);
            $this->data['layout'] = (empty($this->layout)) ? 'layout/cpanel' : $this->layout;
            $this->data['body'] = (!empty($this->view)) ? $this->view : strtolower($view_folder . '/' . $router->methodName());
            return view($this->data['body'], $this->data);
        }

        return $redirect;
    }



    public function getTemplates(){
        $env = getenv("templates");
        if(is_dir(FCPATH . "templates/themes/".$env)){
            if($this->data["settings"]->site_logo == ""){
                $this->data["settings"]->site_logo = "/templates/themes/".$env."/assets/images/logo.png";
                $this->data["settings"]->site_logo_srcset = "/templates/themes/".$env."/assets/images/logo.png";
                
            }
            if($this->data["settings"]->site_logo_2 == ""){
                $this->data["settings"]->site_logo_2 = "/templates/themes/".$env."/assets/images/logo-full-white.png";
                $this->data["settings"]->site_logo_2_srcset = "/templates/themes/".$env."/assets/images/logo-full-white.png";
            }
            if($this->data["settings"]->site_banner == ""){
                $this->data["settings"]->site_banner = "/templates/themes/".$env."/assets/images/banner.png";
            }

            //return 'themes/'.$env.'/layout/cpanel';
        }
        return 'layout/cpanel';
    }
    
}



