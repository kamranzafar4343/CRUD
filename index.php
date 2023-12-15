<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container my-5">

        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="create.php" role="button">New Client</a>
        <br>

        <table class="table">

            <thead>
                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created at</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>


                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop";

                //create connection
                $connection = new mysqli($servername, $username, $password, $database);

                //check connection
                if ($connection->connect_error) {
                    die("Connection Error:" . $connection->connect_error);
                }

                //read all data from database table
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                //check for invalid query ("got error in this $result and i did'nt wrote !, thankfully solved in 30 mins")   
                if (!$result) {
                    die("Invalid query" . $connection->error);
                }

                //read data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                <tr>

                 <td>$row[id]</td>
                 <td>$row[name]</td>
                 <td>$row[email]</td>
                 <td>$row[phone]</td>
                 <td>$row[address]</td>
                 <td>$row[created_at]</td>

                  <td>
                      <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
                      <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>

                  </td>
                ";
                }




                ?>





            </tbody>


        </table>
    </div>

</body>

</html>