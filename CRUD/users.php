<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="C:\xampp\htdocs\CRUD\table.css"> -->
    <title>User Details</title>
    <style>
/* Modern Table Styling */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

.table-container {
  margin: 2rem;
  background: rgba(255, 255, 255, 0.95);
  border-radius: 1rem;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(10px);
  overflow-x: auto;
}

table {
  border-bottom:1px solid #764ba2;
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  font-family: 'Inter', sans-serif;
  text-align:center;
}

thead {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

th {
  color: white;
  font-weight: 600;
  padding: 1.25rem 1rem;
  text-align: left;
  font-size: 0.875rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  border:1px solid #764ba2;
  text-align:center;
  
}

th:first-child {
  border-top-left-radius: 1rem;
}

th:last-child {
  border-top-right-radius: 1rem;
}

td {
  padding: 1rem;
  border-bottom: 1px solid #e2e8f0;
  color: #2d3748;
  font-size: 0.875rem;
  border:1px solid #764ba2;

}

tbody tr {
  transition: all 0.2s ease;
  border:1px solid #764ba2;

}

tbody tr:hover {
  background-color: #f7fafc;
}

tbody tr:last-child td {
  border-bottom: none;
}

/* Action buttons */
.action-btn {
  padding: 0.5rem 1rem;
  border-radius: 0.375rem;
  font-weight: 500;
  font-size: 0.875rem;
  transition: all 0.2s ease;
  cursor: pointer;
  border: none;
  outline: none;
}

.edit-btn {
  background-color: #667eea;
  color: white;
}

.edit-btn:hover {
  background-color: #5a67d8;
}

.delete-btn {
  background-color: #fc8181;
  color: white;
}

.delete-btn:hover {
  background-color: #f56565;
}

/* Responsive Design */
@media (max-width: 768px) {
  .table-container {
    margin: 1rem;
    border-radius: 0.5rem;
  }
  
  th, td {
    padding: 0.75rem 0.5rem;
    font-size: 0.75rem;
  }
  
  .action-btn {
    padding: 0.375rem 0.75rem;
    font-size: 0.75rem;
  }
}
img{
    width: 20px;
    height: 20px;
}
    </style>
</head>
<body>
   
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require('./conection.php');
            $p=crud::Selectdata();
            if (isset($_GET['id'])) {
                $id=$_GET['id'];
                $e=crud::delete($id);
            }
            if (count( $p)>0) {
                for ($i=0; $i < count( $p); $i++) { 
                   echo '<tr>';
                   foreach ( $p[$i] as $key => $value) {
                    if ($key!='id') {
                        echo '<td>'.$value.'</td>';
                    }
                    }
                    ?> 
                    <td><a href="users.php?id=<?php echo $p[$i]['id'] ?>"><img src="./trash.svg" alt="" srcset=""></a></td>
                    <td><a href="upDate.php?id_up=<?php echo $p[$i]['id'] ?>"><img src="./edit.svg" alt="" srcset=""></a></td>
                    <?php
                    echo '</tr>';
                }
            }
    ?>
        </tbody>
    </table>
</body>
</html>