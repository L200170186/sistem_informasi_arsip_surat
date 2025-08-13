<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\KodeModel;
use App\Models\MasukModel;
use App\Models\KeluarModel;
use App\Models\UserModel;
use App\Models\TokenModel;
use App\Config\Email;
use Error;
use PharIo\Manifest\Application;


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
	protected $helpers = ['form'];

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

		session();
		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
		// $this->session = \Config\Services::session();
	}

	protected $kodeModel;
	protected $masukModel;
	protected $keluarModel;
	protected $userModel;
	protected $tokenModel;
	protected $email;
	public function __construct()
	{
		$this->email = \Config\Services::email();
		$this->kodeModel = new KodeModel();
		$this->masukModel = new MasukModel();
		$this->keluarModel = new KeluarModel();
		$this->userModel = new UserModel();
		$this->tokenModel = new TokenModel();
		\Config\Services::validation();
	}
}
