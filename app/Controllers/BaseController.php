<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use CodeIgniter\Controller;

use App\Models\CommonModel;

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
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form'];
	
	protected $errors;   // gets any other errors

	
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

		

		//---------------------------------
		// errors other than validation

		$this->errors = [];

	}


	/**
	 * Render views with admin layout
	 *
	 * @param string $page View file path not including 'admin/'
	 * @param string $page_title Page title
	 * @param array $controller_data Passed data
	 * @param array $css Loaded stylesheets for this view
	 * @param array $js Loaded scripts for this view
	 * @return void
	 */
	protected function loadView($page , $page_title, $data = [] , $css = [] , $js = [] ) {
		
		if ( !is_file(APPPATH . '/Views/site/' . $page . '.php') ) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException('/Views/site/' . $page);
		}

		// prep.  data
		$content['view_file'] = 'site/' . $page;

		$content['page_title'] = $page_title;

		$content['controller_data'] = $data;

		$content['css'] = $css;

		$content['js'] = $js;

		$content['errors'] = $this->errors;

		echo view('site/layout', $content);


	}
}
