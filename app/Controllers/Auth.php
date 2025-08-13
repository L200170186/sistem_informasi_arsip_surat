<?php

namespace App\Controllers;

class Auth extends BaseController
{
	public function index()
	{
		if (session()->get('logged_in')) {
			return redirect()->to('/dashboard');
		}
		$data = [
			'title' => 'Login'
		];
		return view('auth/login', $data);
	}

	public function process()
	{
		$users = $this->userModel;
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$dataUser = $users->where([
			'username' => $username,
		])->first();

		if ($dataUser) {
			if (password_verify($password, $dataUser['password'])) {
				session()->set([
					'id_user' => $dataUser['id_user'],
					'logged_in' => TRUE
				]);
				session()->setFlashdata('login', 'Anda berhasil login.');
				return redirect()->to('/dashboard/index');
			} else {
				session()->setFlashdata('error', 'Username & Password Salah');
				return redirect()->to('/auth');
			}
		} else {
			session()->setFlashdata('error', 'Username & Password Salah');
			return redirect()->to('/auth');
		}
	}



	public function logout()
	{
		unset(
			$_SESSION['id_user'],
			$_SESSION['logged_in'],
			$_SESSION['darism'],
			$_SESSION['sampaism'],
			$_SESSION['berdasarkansm'],
			$_SESSION['darisk'],
			$_SESSION['sampaisk']
		);

		session()->setFlashdata('logout', 'Anda berhasil logout');

		return redirect()->to('/auth');
	}

	public function lupapassword()
	{
		if (session()->get('logged_in')) {
			return redirect()->to('/dashboard');
		}
		$data = [
			'title' => 'Lupa Password'
		];
		return view('auth/lupapassword', $data);
	}

	public function processubah()
	{
		$users = $this->userModel;
		$username = $this->request->getVar('username');
		$dataUser = $users->where([
			'username' => $username,
		])->first();

		if ($dataUser) {
			$token = base64_encode(random_bytes(32));
			$this->tokenModel->save([
				'id_user' => $dataUser['id_user'],
				'email' => $dataUser['email'],
				'token' => $token
			]);

			$this->sendemail($token);

			session()->setFlashdata('sukses', 'email sukses dikirim silahkan cek email anda, jika tidak masuk coba cek pada bagian spam');
			return redirect()->to('/auth/lupapassword');
		} else {
			session()->setFlashdata('gagal', 'username yang anda masukkan tidak terdaftar');
			return redirect()->to('/auth/lupapassword');
		}
	}

	public function sendemail($token)
	{
		$users = $this->userModel;
		$username = $this->request->getVar('username');
		$dataUser = $users->where([
			'username' => $username,
		])->first();

		$this->email->setFrom('arsipsurat30@gmail.com', 'ArsipSurat');
		$this->email->setTo($dataUser['email']);

		$this->email->setSubject('Reset Password');
		$this->email->setMessage('Click this link to reset your password : <a href="' . base_url() . '/auth/resetpassword?email=' . $dataUser['email'] . '&token=' . urlencode($token) . '">Reset Password</a>');

		if (!$this->email->send()) {
			return false;
		} else {
			return true;
		}
	}



	public function ubahpassword()
	{
		if (session()->get('logged_in')) {
			return redirect()->to('/dashboard');
		}
		if (!session()->get('reset_email')) {
			return redirect()->to('/auth');
		}
		$data = [
			'validation' => \Config\Services::validation(),
			'title' => 'Ubah Password'
		];
		echo view('auth/ubahpassword', $data);
	}

	public function resetpassword()
	{
		$email = $this->request->getVar('email');
		$token = $this->request->getVar('token');

		$users = $this->userModel;
		$dataUser = $users->where([
			'email' => $email,
		])->first();

		if ($dataUser) {
			$tokens = $this->tokenModel;
			$dataToken = $tokens->where([
				'token' => $token,
			])->first();

			if ($dataToken) {
				session()->set([
					'reset_email' => $email
				]);

				$this->ubahpassword();
			} else {
				session()->setFlashdata('token', 'Reset password gagal! Token salah');
				return redirect()->to('/auth');
			}
		} else {
			session()->setFlashdata('email', 'Reset password gagal! Email salah');
			return redirect()->to('/auth');
		}
	}

	public function changePassword()
	{
		if (!session()->get('reset_email')) {
			return redirect()->to('/auth');
		}

		if (!$this->validate([
			'passwordbaru' => [
				'rules' => 'required|alpha_numeric|min_length[5]|matches[passwordbaru2]',
				'errors' => [
					'required' => 'password harus diisi.',
					'alpha_numeric' => 'password tidak boleh menggunakan spasi atau simbol.',
					'min_length' => 'password minimal terdiri dari 5 karakter.',
					'matches' => 'password baru tidak sesuai.'
				]
			],
			'passwordbaru2' => [
				'rules' => 'required|alpha_numeric|min_length[5]|matches[passwordbaru]',
				'errors' => [
					'required' => 'password harus diisi.',
					'alpha_numeric' => 'password tidak boleh menggunakan spasi atau simbol.',
					'min_length' => 'password minimal terdiri dari 5 karakter.',
					'matches' => 'password baru tidak sesuai.'
				]
			]

		])) {
			return redirect()->to('auth/ubahpassword')->withInput();
		} else {

			$password = password_hash($this->request->getVar('passwordbaru'), PASSWORD_DEFAULT);
			$email = session()->get('reset_email');
			$data = [
				'password' => $password
			];

			$this->userModel->reset_password($data, $email);

			$this->tokenModel->delete_token($email);

			unset(
				$_SESSION['reset_email']
			);

			session()->setFlashdata('berhasil', 'Reset password berhasil! Silahkan login kembali');
			return redirect()->to('/auth');
		}
	}
}
