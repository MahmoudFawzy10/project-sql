<?php

@include 'conection.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
      <title>My Food</title>
   <style>
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

:root {
  --primary: #667eea;
  --primary-dark: #5a67d8;
  --secondary: #764ba2;
  --text-dark: #2d3748;
  --text-light: #4a5568;
  --white: #ffffff;
  --gray-100: #f7fafc;
  --gray-200: #e2e8f0;
  --gray-300: #cbd5e0;
  --success: #c6f6d5;
  --success-text: #2f855a;
  --error: #fed7d7;
  --error-text: #c53030;
  --delete: #e53e3e;
  --delete-hover: #c53030;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Inter', sans-serif;
}

body {
  background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
  min-height: 100vh;
  color: var(--text-dark);
  line-height: 1.5;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 2rem;
}

/* Shopping Cart Styles */
.shopping-cart {
  background: rgba(255, 255, 255, 0.95);
  border-radius: 1rem;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(10px);
  padding: 2rem;
}

.heading {
  font-size: 2rem;
  font-weight: 600;
  color: var(--text-dark);
  margin-bottom: 2rem;
  text-align: center;
  text-transform: capitalize;
}

/* Table Styles */
table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 2rem;
}

thead th {
  background-color: var(--gray-100);
  padding: 1.25rem 1rem;
  text-align: left;
  font-weight: 600;
  font-size: 0.875rem;
  color: var(--text-light);
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

tbody td {
  padding: 1.25rem 1rem;
  border-top: 1px solid var(--gray-200);
  vertical-align: middle;
}

tbody img {
  width: 5rem;
  height: 5rem;
  object-fit: cover;
  border-radius: 0.5rem;
}

/* Form Elements */
form {
  display: flex;
  gap: 0.5rem;
  align-items: center;
}

input[type="number"] {
  width: 5rem;
  padding: 0.5rem;
  border: 2px solid var(--gray-200);
  border-radius: 0.5rem;
  font-size: 0.875rem;
  outline: none;
  transition: all 0.3s ease;
}

input[type="number"]:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

/* Button Styles */
.btn,
.option-btn,
.delete-btn {
  display: inline-block;
  padding: 0.75rem 1.5rem;
  font-size: 0.875rem;
  font-weight: 500;
  text-align: center;
  text-decoration: none;
  border-radius: 0.5rem;
  cursor: pointer;
  transition: all 0.3s ease;
  border: none;
}

.btn {
  background: var(--primary);
  color: var(--white);
}

.btn:hover {
  background: var(--primary-dark);
  transform: translateY(-1px);
}

.option-btn {
  background: var(--gray-100);
  color: var(--text-dark);
}

.option-btn:hover {
  background: var(--gray-200);
  transform: translateY(-1px);
}

.delete-btn {
  background: var(--delete);
  color: var(--white);
}

.delete-btn:hover {
  background: var(--delete-hover);
  transform: translateY(-1px);
}

.disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

/* Table Bottom */
.table-bottom {
  background: var(--gray-100);
  font-weight: 600;
}

.table-bottom td {
  padding: 1.5rem 1rem;
}

/* Checkout Button */
.checkout-btn {
  text-align: right;
  margin-top: 2rem;
}

.checkout-btn .btn {
  padding: 1rem 2rem;
  font-size: 1rem;
}

/* Responsive Design */
@media (max-width: 768px) {
  .container {
    padding: 1rem;
  }

  .shopping-cart {
    padding: 1.5rem;
    overflow-x: auto;
  }

  table {
    min-width: 700px;
  }

  .heading {
    font-size: 1.75rem;
  }
}

@media (max-width: 480px) {
  .btn,
  .option-btn,
  .delete-btn {
    width: 100%;
    margin-bottom: 0.5rem;
  }

  .checkout-btn {
    text-align: center;
  }

  tbody img {
    width: 4rem;
    height: 4rem;
  }
}

   </style>

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>$<?php echo number_format($fetch_cart['price']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>$<?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>

</section>

</div>
   
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>