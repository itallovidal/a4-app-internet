<?

// class UserFormController{
//     private $db;
//     private $usersDAO;

//     public function index(){
//         $this->userForm();
//     }

//     public function userForm(){

//         require_once '../app/model/users.php';
//         require_once '../app/dao/usersDAO.php';
//         require_once '../app/model/database.php';

//         $database = new MySQLDatabase();
//         $this->db = $database->connect();
//         $this->usersDAO = new UsersDAO($this->db);
        
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             $name = $_POST['name'] ?? '';
//             $email = $_POST['email'] ?? '';
//             $password = $_POST['password'] ?? '';
            
//             try {
//                 $user = new User();
//                 $user->setName($name);
//                 $user->setEmail($email);
//                 $user->setPassword($password);
                
//                 $this->usersDAO->createUser($user);
//                 echo "<script>alert('Usuário criado com sucesso!'); window.location.href='/'</script>";
//                 exit();
//             } catch (Exception $e) {
//                 echo "<script>alert('Erro: {$e->getMessage()}');</script>";
//             }
//         }        
//         require_once '../app/views/users/form/userForm.php';
//     }
// }
