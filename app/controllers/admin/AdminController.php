<?php 
namespace app\controllers\admin;

use JanKlod\Http\Controller;
use \Auth;
use app\models\User;
use JanKlod\Validation\Validate;
use \HTML;
use \Asset;



/**
 * @package app\controllers\admin
 */
class AdminController extends Controller
{
        
        
        /**
         * set another layout
         * @var string
        */
        // protected $layout = 'admin';


        /**
         * @var app\models\User
        */
        protected $user;

        
        /**
         * @var JanKlod\Validation\Validate
         */
        protected $validation;


        
        /**
         * Errors data
         * @var array
         */
        protected $errors = [];
        


        /**
         * Constructor
         * @param ContainerInterface $app 
         * @return void
        */
         public function __construct($app)
         {
                // Вызод родительского конструктор , т.е базовая контроллер Controller
                parent::__construct($app);
                   
                if(Auth::isLogged())
                {
                    response()->redirect('/');

                }
                
                // Получаем модел узер
                $this->user = new User();
                
                // Получаем валидатор
                $this->validation = new Validate();

                // Установливаю мета данных для вида
                HTML::setMeta($this->meta());

                // Установливаю все необходимые параметеры для вывода стилей и скриптов
                // для конкретного контроллера или все его дочерые
                Asset::setParams($this->app->configs['asset'], $this->app->base_url);
         }


        
         
         /**
         * This is for the moment, I'll remove them after 
         * and create method for management meta datas
         * 
         * content metas datas
         * @return array
         */
         private function meta()
         {
            // Тут возврашаю все конфиги мета данных в виде массив.
            return [
               'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
               'description' => '',
               'author' => ''
            ];
        }

}