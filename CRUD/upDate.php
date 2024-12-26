<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="C:\xampp\htdocs\CRUD\signup.css"> -->
    <title>Sign UPt</title>
    <style>
      /* Modern Sign Up Form Styling */
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
  max-width: 450px;
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
}

a:hover {
  color: #5a67d8;
  text-decoration: underline;
}

/* Success/Error Messages */
.message {
  padding: 1rem;
  border-radius: 0.5rem;
  margin-bottom: 1rem;
  text-align: center;
  font-size: 0.875rem;
}

.success {
  background-color: #c6f6d5;
  color: #2f855a;
}

.error {
  background-color: #fed7d7;
  color: #c53030;
}

/* Responsive Design */
@media (max-width: 480px) {
  .form {
    padding: 1.5rem;
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
        if (isset($_POST['signUP_button'])) {
            $name=$_POST['name'];
            $lastName=$_POST['lastName'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $confPassword=$_POST['confiPassword'];
           if (!empty($_POST['name'])&& !empty($_POST['lastName'])&& !empty($_POST['email'])&&!empty($_POST['password'])) {
            if ($password== $confPassword) {
                $p=crud::conect()->prepare ('UPDATE crudtable set NAME=:n,lastName=:l,email=:e,pass=:p') ;
                $p->bindValue(':n', $name);
                $p->bindValue(':l', $lastName);
                $p->bindValue(':e', $email);
                $p->bindValue(':p',$password);
                $p->execute();
                echo 'UPDATED';
            }else{
                echo 'Password does not match!';
            }
           }
        }

    ?>
    <div class="form">
        <div class="title">
            <p>Sign UP form</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="lastName" placeholder="Last name">
            <input type="email" name="email" placeholder="Email">
            <input type="Password" name="password" placeholder="Password">
            <input type="Password" name="confiPassword" placeholder="Confrim password">
            
            <input type="submit" value="UPDATE" name="signUP_button"> 
            <a href="./login.php">Do you have account? Sign in</a>
        </form>
    </div>
</body>
</html>