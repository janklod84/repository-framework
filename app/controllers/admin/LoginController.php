<?php 
namespace app\controllers\admin;


use JanKlod\Http\Controller;



/**
 * @package app\controllers\admin\LoginController
*/
class LoginController extends Controller
{
        

        /**
         * defined layout all views inside this controller
         * For Exemple [ public $layout = 'admin' ]
         * 
         * You can change layout how you want..
         * 
         * @var string $layout
        */
        
        // public $layout = 'admin';


        /**
         * Constructor
         * @param ContainerInterface $app 
         * @return void
        */
        public function __construct($app)
        {
            parent::__construct($app);
        }

        
        /**
         * Index
         * response()->redirect('/')
         * $this->layout = 'default';
         * @return void
        */
        public function index()
        {    
             if($this->isPost())
             {
                  // echo 'Yes';
                   debug($this->request->post('test'));
             }
             
             //response()->withStatus(505); 
    	     $this->form();
        }

        private function form()
        {
    	     $this->render('partials/form');
        }
}