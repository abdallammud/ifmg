<?php
/**
 * Auth Controller
 */

require_once MODEL_PATH . 'User.php';

class AuthController extends Controller
{
    public function login()
    {
        Middleware::guest();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->findByUsername($username);

            if ($user && password_verify($password, $user['password_hash'])) {
                Auth::login($user);
                $userModel->updateLastLogin($user['id']);
                logActivity("Logged in", "users", $user['id']);
                $this->redirect('dashboard');
            } else {
                Session::flash('error', 'Invalid username or password.');
                $this->redirect('login');
            }
        }

        // Render login view without the main layout
        $viewFile = VIEW_PATH . 'auth/login.php';
        require_once VIEW_PATH . 'layouts/auth.php';
    }

    public function logout()
    {
        logActivity("Logged out");
        Auth::logout();
        $this->redirect('login');
    }
}
