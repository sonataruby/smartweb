<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Libraries\Users;

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
    protected $agent;
    protected $javascript = [];
    protected $javascriptEx = [];
    protected $stylesheet = [];
    protected $stylesheetEx = [];
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
        $agent = $this->request->getUserAgent();

        if ($agent->isBrowser())
        {
                $this->agent = $agent->getBrowser().' '.$agent->getVersion();
        }
        elseif ($agent->isRobot())
        {
                $this->agent = $this->agent->getRobot();
        }
        elseif ($agent->isMobile())
        {
                $this->agent = $agent->getMobile();
        }
        else
        {
                $this->agent = 'Unidentified User Agent';
        }

		$this->session = \Config\Services::session();
        $this->user = new Users();
        $this->data["users"] = $this->user->getSession();
        $this->data["is_login"] = ($this->data["users"]->user_id > 0 ? "yes" : "no");
        
        $locale = $this->request->getVar("language") ? $this->request->getVar("language") : "en";
        
        if(trim($this->request->getVar("language")) != "" && !is_cli()) {
            $this->session->set('lang',$locale);
            echo '<script>window.location="'.previous_url().'";</script>';
            exit();

        }
        if(!$this->session->has("lang")) $this->session->set('lang',$this->request->getLocale());
        if(is_cli()){
            $locale = "en";
        }
        $this->data['language'] = $this->session->has("lang") ? $this->session->get("lang") : $locale;
        $this->request->setLocale($this->data['language']);
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
        $this->layout = $this->getTemplates();

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
        $this->data["javascript"] = $this->getJavascript();
        $this->data["stylesheet"] = $this->getStylesheet();

        if ($this->view !== false) {
            //print_r($this->layout);
            $this->data['layout'] = (empty($this->layout)) ? 'layout/application' : $this->layout;
            $this->data['body'] = (!empty($this->view)) ? $this->view : strtolower($view_folder . '/' . $router->methodName());

            if(getenv("minify_html") == "yes"){
                return $this->minify_HTML($this->replaceShortcode(view($this->data['body'], $this->data)));
            }else{
                return $this->replaceShortcode(view($this->data['body'], $this->data));
            }
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

            return 'themes/'.$env.'/layout/application';
        }
        return 'layout/application';
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


    public function replaceShortcode($html){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM shortcode ORDER BY id ASC")->getResult();
        $find = [];
        $replace = [];
        foreach ($query as $key => $value) {
            $find[] = '['.$value->keyword.']';
            $replace[] = $value->replace_data;

        }
        return str_replace($find,$replace,$html);
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


    /*
    Access Member
    */

    public function setAccess($type=""){

    }


    public function getJavascript(){

        return $this->javascript;
    }
    

    public function getStylesheet(){
        if($this->is_home == false){
            $cssChild = str_replace('layout/application','assets/css/child.css',$this->layout);
            
            if(file_exists(FCPATH . "templates/". $cssChild)){
                $this->stylesheet[] = $cssChild;
            }
        }
        return $this->stylesheet;
    }
    public function getStylesheetEx(){
        return $this->stylesheetEx;
    }
    
    /*
    Load JS
    */

    public function jsLoad($file=[]){

        $js = [];
        if(!is_array($file)){
            $js[md5($file)] = $file;
        }else if(is_array($file)){
            foreach ($file as $key => $value) {
                $js[md5($value)] = $value;
            }
        }

        $this->javascript = array_merge($this->javascript,$js);
        return $this;
    }

   
    /*
    Load CSS
    */

    public function cssLoad($file=[]){
        $css = [];

        if(!is_array($file)){
            $css[md5($file)] = $file;
        }else if(is_array($file)){
            foreach ($file as $key => $value) {
                $css[md5($value)] = $value;
            }
        }

        $this->stylesheet = array_merge($this->stylesheet,$css);
        return $this;
    }

    
}
