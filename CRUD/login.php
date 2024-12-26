<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="C:\xampp\htdocs\CRUD\sign.css"> -->
    <title>Sign UPt</title>
    <style>
        /* .form{
            width: 230px;
            height: 280px;
        }
         */
         /* Modern Login Form Styling */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Inter', sans-serif;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem;
}

.form {
  background: rgba(255, 255, 255, 0.95);
  padding: 2.5rem;
  border-radius: 1rem;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 380px;
  backdrop-filter: blur(10px);
}

.title {
  margin-bottom: 2rem;
  text-align: center;
}

.title p {
  font-size: 1.75rem;
  font-weight: 600;
  color: #2d3748;
  margin-bottom: 0.5rem;
}

form {
  display: flex;
  flex-direction: column;
  gap: 1.25rem;
}

input {
  width: 100%;
  padding: 0.75rem 1rem;
  border: 2px solid #e2e8f0;
  border-radius: 0.5rem;
  font-size: 1rem;
  transition: all 0.3s ease;
  outline: none;
}

input:focus {
  border-color: #667eea;
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

input[type="submit"] {
  background: #667eea;
  color: white;
  font-weight: 500;
  border: none;
  padding: 1rem;
  cursor: pointer;
  transition: all 0.3s ease;
  margin-bottom: 1rem;
}

input[type="submit"]:hover {
  background: #5a67d8;
  transform: translateY(-1px);
}

input[type="submit"]:active {
  transform: translateY(1px);
}

a {
  color: #667eea;
  text-decoration: none;
  text-align: center;
  font-size: 0.875rem;
  transition: color 0.3s ease;
  display: block;
  margin-top: -0.5rem;
}

a:hover {
  color: #5a67d8;
  text-decoration: underline;
}

/* Error Message */
.error-message {
  background-color: #fed7d7;
  color: #c53030;
  padding: 0.75rem;
  border-radius: 0.5rem;
  margin-bottom: 1rem;
  text-align: center;
  font-size: 0.875rem;
}

/* Responsive Design */
@media (max-width: 480px) {
  .form {
    padding: 1.5rem;
    margin: 1rem;
  }
  
  .title p {
    font-size: 1.5rem;
  }
  
  input {
    padding: 0.625rem 0.875rem;
  }
}
    </style>
</head>
<body>

        <?php
            require('./conection.php');
            if (isset($_POST['login_button'])) {
                $_SESSION['validate']=false;
                $name=$_POST['name'];
                $password=$_POST['password'];
                $p=crud::conect()->prepare('SELECT * FROM crudtable WHERE NAME=:n and pass=:p');
                $p->bindValue(':n',$name);
                $p->bindValue(':p',$password);
                $p->execute();
                $d=$p->fetchAll(PDO::FETCH_ASSOC);
                if ($p->rowCount()>0) {
                    $_SESSION['name']=$name;
                    $_SESSION['pass']=$password;
                    $_SESSION['validate']=true;
                    header('location:website.php');
                }else {
                    echo'Make sure that you are registered!';
                }
        }
        ?>
    <div class="form">
        <div class="title">
            <p>Login form</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name">
            <input type="Password" name="password" placeholder="Password">
            <input type="submit" value="Login" name="login_button"> 
            <a href="./signUP.php" style="position:relative; left:50px;top:-8px; font-size:14px">Click here to sign up</a>
        </form>
    </div>
</body>
</html>