<!DOCTYPE HTML>
<html>
 
<head>
    <title>PDO - Criar um Registro - Tutorial de PHP CRUD</title>
    <!-- Latest compiled and minified Bootstrap CSS -->
    <!-- Último CSS Bootstrap compilado e minificado -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
 
<body>
 
    <!--container-->
    <div class="container">
        <div class="page-header">
            <h1>Create Product</h1>
        </div>
        <?php
        if ($_POST) {
            // include database connection
            // incluir conexão com o banco de dados
            include 'config/database.php';
            try {
                // insert query
                // consulta de inserção
                $query = "INSERT INTO products SET name=:name, description=:description, price=:price, created=:created";
                // prepare query for execution
                // preparar consulta para execução
                $stmt = $con ->prepare($query);
                // posted values
                // valores enviados
                $name = htmlspecialchars(strip_tags($_POST['name']));
                $description = htmlspecialchars(strip_tags($_POST['description']));
                $price = htmlspecialchars(strip_tags($_POST['price']));
                // bind the parameters
                // vincular os parametros
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':price', $price);
                //especificar quando esse registro foi inserido no banco de dados
                $created = date('Y-m-d H:i:s');
                $stmt->bindParam(':created', $created);
                // executar a consulta
                if ($stmt->execute()) {
                    echo "<div class= 'alert alert-sucess'>Record was saved.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Unable to save record.</div>";
                }
            }
            //mostrar erro
            catch (PDOException $exception) {
                die('ERROR: ' . $exception->getMessage());
            }
        }
        ?>
 
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>Name</td>
                    <td><input type='text' name='name' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name='description' class='form-control'></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type='text' name='price' class='form-control' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save' class='btn btn-primary' />
                        <a href='index.php' class='btn btn-danger'>Back to read products</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
 
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
 
</html>