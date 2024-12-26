<style>
  /* Header Variables */
:root {
  --header-bg: rgba(255, 255, 255, 0.95);
  --header-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
  --header-border: #e2e8f0;
  --logo-color: #667eea;
  --logo-hover: #5a67d8;
  --nav-text: #2d3748;
  --nav-hover: #667eea;
  --cart-badge: #667eea;
}

/* Header Container */
.header {
  background: var(--header-bg);
  backdrop-filter: blur(10px);
  position: sticky;
  top: 0;
  z-index: 1000;
  box-shadow: var(--header-shadow);
}

/* Flex Container */
.header .flex {
  max-width: 1200px;
  margin: 0 auto;
  padding: 1.25rem 2rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2rem;
}

/* Logo Styles */
.header .logo {
  font-size: 1.75rem;
  font-weight: 600;
  color: var(--logo-color);
  text-decoration: none;
  letter-spacing: -0.025em;
  transition: color 0.2s ease;
}

.header .logo:hover {
  color: var(--logo-hover);
}

/* Navigation */
.header .navbar {
  display: flex;
  gap: 2.5rem;
  margin: 0 auto;
}

.header .navbar a {
  color: var(--nav-text);
  text-decoration: none;
  font-weight: 500;
  font-size: 1rem;
  transition: all 0.2s ease;
  padding: 0.5rem 0;
  position: relative;
}

.header .navbar a::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0;
  height: 2px;
  background: var(--nav-hover);
  transition: width 0.2s ease;
}

.header .navbar a:hover {
  color: var(--nav-hover);
}

.header .navbar a:hover::after {
  width: 100%;
}

/* Cart Button */
.header .cart {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: var(--nav-text);
  text-decoration: none;
  font-weight: 500;
  padding: 0.5rem 1rem;
  border-radius: 9999px;
  transition: background-color 0.2s ease;
}

.header .cart:hover {
  background-color: rgba(102, 126, 234, 0.1);
}

.header .cart span {
  background: var(--cart-badge);
  color: white;
  padding: 0.25rem 0.75rem;
  border-radius: 9999px;
  font-size: 0.875rem;
  font-weight: 600;
}

/* Menu Button */
#menu-btn {
  display: none;
  cursor: pointer;
  font-size: 1.5rem;
  color: var(--nav-text);
  padding: 0.5rem;
  border-radius: 0.375rem;
  transition: background-color 0.2s ease;
}

#menu-btn:hover {
  background-color: rgba(102, 126, 234, 0.1);
}

/* Responsive Design */
@media (max-width: 768px) {
  .header .flex {
    padding: 1rem;
  }

  #menu-btn {
    display: block;
  }

  .header .navbar {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: var(--header-bg);
    border-top: 1px solid var(--header-border);
    border-bottom: 1px solid var(--header-border);
    padding: 1rem;
    flex-direction: column;
    gap: 0;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-1rem);
    transition: all 0.3s ease;
  }

  .header .navbar.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }

  .header .navbar a {
    padding: 1rem;
    text-align: center;
  }

  .header .navbar a::after {
    display: none;
  }
}

@media (max-width: 480px) {
  .header .logo {
    font-size: 1.5rem;
  }

  .header .cart {
    padding: 0.5rem;
  }
}
</style>
<header class="header">

   <div class="flex">

      <a href="#" class="logo">foodies</a>

      <nav class="navbar">
         <a href="admin.php">add products</a>
         <a href="products.php">view products</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>
