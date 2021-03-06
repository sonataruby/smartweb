<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Libraries\Users;
class AdminController extends Controller
{

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
    protected $directory = 'admin'; // Set default directory
    protected $layout = 'layout/backend'; // Set default layout
    protected $arguments = []; // arguments that will be sent to the methods
    protected $model_class = null; // Models class used to default CRUD

    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        // $this->session = \Config\Services::session();
        // Required if you're using flashdata
        $this->session = \Config\Services::session();

        //--------------------------------------------------------------------
        // Check for flashdata
        //--------------------------------------------------------------------
        $this->data['confirm'] = $this->session->getFlashdata('confirm');
        $this->data['errors'] = $this->session->getFlashdata('errors');
        $agent = $this->request->getUserAgent();

        if ($agent->isBrowser())
        {
                $this->agent = $agent->getBrowser().' '.$agent->getVersion();
        }
        elseif ($agent->isRobot())
        {
                $this->agent = $agent->getRobot();
        }
        elseif ($agent->isMobile())
        {
                $this->agent = $agent->getMobile();
        }
        else
        {
                $this->agent = 'Unidentified User Agent';
        }


        $this->user = new Users;

        $this->data["users"] = $this->user->getSession();
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
        $language = \Config\Services::language();
        $language->setLocale($this->data['language']);
        
        $this->data["supportlangauge"] = ["en" => "EN"];
        // Arguments to be used in the callback remap
        $segments = $request->uri->getSegments();
        $this->arguments = array_slice($segments, (($this->directory === '') ? 2 : 3));
        if ($this->directory === '') {
            $this->redirect = $this->request->uri->getSegment(1);
        } else {
            $this->request->uri->getSegment(1) . '/' . $this->request->uri->getSegment(2);
        }

        $this->data["settings"] = $this->getSettings();
        $slang = explode("|",$this->data["settings"]->mutile_lang);
        $langsupport = [];
        if(is_array($slang)){
            foreach ($slang as $key => $value) {
                list($k,$val) = explode("=",$value);
                $langsupport[$k] = $val;
            }
        }
       

        $this->data["supportlangauge"] = array_merge($this->data["supportlangauge"],$langsupport);
    }

    /**
     * --------------------------------------------------------------------
     *   REMAP AUTOLOAD VIEWS
     * --------------------------------------------------------------------
     */

    /**
     * Remap the CI request, running the method
     * and loading the view automagically
     * @param string $method The method we're trying to load
     */
    public function _remap($method = null)
    {
        $router = service('router');

        $controller_full_name = explode('\\', $router->controllerName());
        $view_folder = strtolower($this->directory . '/' . end($controller_full_name));
        
        /** Access Admin **/

        if(!$this->session->has('userlogin') ){
            return redirect()->to("/account/login?return=".current_url());
            exit();
        }

        if($this->user->isAdmin() == false){
            return redirect()->to("/account/permission");
            exit();
        }

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

        

        if ($this->view !== false) {
            $this->data['layout'] = (empty($this->layout)) ? 'layout/nolayout' : $this->layout;
            $this->data['body'] = (!empty($this->view)) ? $this->view : strtolower($view_folder . '/' . $router->methodName());
            return view($this->data['body'], $this->data);
        }
        return $redirect;
    }


    public function _permission(){
       
        
    }
    

    public function getTemplates(){
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

}
?>