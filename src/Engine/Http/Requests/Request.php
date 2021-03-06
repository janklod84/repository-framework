<?php 
namespace JanKlod\Http\Requests;


use JanKlod\Http\Servers\{
	ServerRequest, 
	ServerRequestRepository
};

use JanKlod\Http\Collections\GlobalFactory;


/**
 * This class will be fixed!
 * This code it's for moment
 * 
 * @package JanKlod\Http\Requests\Request
*/ 
class Request implements RequestInterface
{

         /**
          * @var JanKlod\Http\GlobalFactory
         */
         private $global;
        

         /**
          * @var \JanKlod\Http\Servers\ServerRequest
         */
         private $server;


         /**
          * Constructor
          * @return void
         */
         public function __construct()
         {
               $this->global = new GlobalFactory(); 
               $this->server = new ServerRequest();
               $this->serverRepository = new ServerRequestRepository($this->server); 
         }

         
         /**
          * Get global server
          * @param string $key 
          * @return mixed
         */
         public function fromGlobals($key = null) {}


         /**
          * Get Base Url
		      * if $uri = false, it'll remove URI string /
          * @return type
         */
         public function baseUrl($uri = true)
         {
             return implode($this->urlParams($uri));
         }

         
         /**
          * Prepare URL request
          * @param type $url 
          * @return type
         */
         public function prepareUrl($url) {}
        

         /**
		      * Get Details from URL
		      * @param string $path 
		      * @return array
	       */
    		 public function parseUrl(string $url)
    		 {
    			   return parse_url($url);
    		 }


         /**
          * Get item from superglobal array $_GET
          * @param string $key
          * @return mixed
         */
         public function get($key = null)
         {
             // return is_null($key) ? $_GET : $_GET[$key] ?? null;
              $collection = $this->global->retrieve('get');
              return $this->find($collection, $key);
         }

         /**
          * Get item from superglobal array $_POST
          * @param string $key
          * @return mixed
         */
         public function post($key = null)
         {
             
             // return is_null($key) ? $_POST : $_POST[$key] ?? null;
             $collection = $this->global->retrieve('post');
             return $this->find($collection, $key);
         }


         /**
          * Get item from superglobal array $_REQUEST
          * @param string $key
          * @return mixed
         */
         public function request($key = null)
         {
             // return is_null($key) ? $_REQUEST : $_REQUEST[$key] ?? null;
             $collection = $this->global->retrieve('request');
             return $this->find($collection, $key);
         }


         /**
          * Get item from superglobal array $_FILES
          * @param string $key
          * @return mixed
         */
         public function files($key = null)
         {
             // return is_null($key) ? $_FILES : $_FILES[$key] ?? null;
             $collection = $this->global->retrieve('file');
             return $this->find($collection, $key);
         }


         /**
          * current request method
          * @return string
         */
         public function method()
         {
             return $this->server->method();
         }


         /**
          * current request method
          * @return string
         */
         public function uri()
         {
             return $this->server->uri();
         }



         public function queryString($trim = false)
         {
             return $this->server->queryString($trim);
         }



         /**
          * Get item from superglobal array $_COOKIES
          * @param string $key
          * @return mixed
         */
         public function cookie($key = null)
         {
             // return is_null($key) ? $_COOKIE : $_COOKIE[$key] ?? null;
             $collection = $this->global->retrieve('cookie');
             return $this->find($collection, $key);
         }

 
         /**
          * Get item from superglobal array $_FILES
          * @param string $key
          * @return mixed
         */
         public function server($key = null)
         {

             // return is_null($key) ? $_SERVER : $_SERVER[$key] ?? [];
             $collection = $this->global->retrieve('server');
             return $this->find($collection, $key);
         }

         
         /**
          * Determine if method request is POST
          * @return bool
         */
         public function isPost(): bool
         {
         	    return $this->serverRepository->isPost();
         }

         

         /**
          * Determine if method request is GET
          * @return bool
         */
         public function isGet(): bool
         {
             return $this->serverRepository->isGet();
         }



         /**
          * Determine if method request is Ajax
          * @return bool
         */
         public function isAjax(): bool
         {
             return $this->serverRepository->isAjax();
         }


         
         /**
          * Find item in current collection
          * @param Collection $collection 
          * @param string $key 
          * @return mixed
         */
         private function find($collection, $key)
         {
              // debug($collection->all(), true);
         	    return is_null($key) ? $collection->all() : $collection->get($key);
         }

         /**
          * 
          * @param bool $uri 
          * @return string
        */
         private function urlParams($uri)
         {
              return [
                  $this->server->scheme(),
                  '://',
                  $this->server->host(),
                  !$uri ? '' : $this->server->uri()
              ];
         }

}