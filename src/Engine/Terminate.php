<?php 
namespace JanKlod;

use JanKlod\Http\Requests\{
	RequestInterface,
	ResponseInterface
};


/**
 * @package JanKlod\Terminate
*/
interface Terminate
{
	  /**
	   * Break Point
       * Handle intermediate beetwen request and response
       * @param RequestInterface $request 
       * @return ResponseInterface
      */
	  public function handle(RequestInterface $request): ResponseInterface;
}