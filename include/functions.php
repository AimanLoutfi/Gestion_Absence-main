<?php

//***********Professeur Validation Functions********** */

function login()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        global $conn;
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);

        if (user_login($email, $password)) {

            if (isset($_POST['check'])) {
                setcookie('email', $email, time() + 365 * 24 * 3600, null, null, false, true);
                setcookie('password', $_POST['password'], time() + 365 * 24 * 3600, null, null, false, true);
            }
            
            // Redirect user based on their type
            redirectUser($_SESSION['user_type']);
        } else
            echo '<div class="alert alert-danger">Courriel ou mot de passe erroné</div>';
    }
}
   

   // user
   function user_login($email, $password)
   {
    global $conn;
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['email'] === $email && $row['password'] === $password) {
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['user_type'] = $row['type']; // Store user type in session
                    return true;
                }
            }
   }
   // Function to redirect users based on their type
function redirectUser($userType)
{
    switch ($userType) {
        case 'responsable scolarité':
            header("Location: /Gestion_Absence/liste.php");
            break;
        case 'responsable de filière':
            header("Location: RespoFilHome.php");
            break;
        case 'formateur':
            header("Location: formateur_page.php");
            break;
        case 'stagiaire':
            header("Location: stagiaire_page.php");
            break;
        default:
            // Redirect to a default page for unrecognized user types
            header("Location: default_page.php");
            break;
    }
    exit; // Ensure script termination after redirection
}

?>
