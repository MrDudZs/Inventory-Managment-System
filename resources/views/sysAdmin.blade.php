<div class="container">
    <div class="row">
        <div class="col custom-dash-cols">
            <h4>Tasks:</h4>
            <hr>
        </div>
        <div class="col custom-dash-cols">
            <h4>Create User Account:</h4>
            <hr>
            <div class="d-grid gap-2">

            </div>
        </div>
        <div class="col custom-dash-cols">
            <h4>Create Account</h4>
            <hr>
            <div class="d-grid gap-2">
                <div class="loginForm">
                    <form action="php/Register/registerProcess.php" method="post">
                        <input class="input" type="email" name="email" placeholder="Email" required>
                        <br>
                        <input class="input" type="text" name="first_name" placeholder="First name" required>
                        <br>
                        <input class="input" type="text" name="surname" placeholder="Surname" required>
                        <br>
                        <input class="input" type="date" name="dob" required>
                        <br>
                        <input class="input" type="password" name="password" placeholder="Password" required>
                        <br>
                        <select class="input" name="role_name" required>
                            <option value="">Select Role</option>
                            <?php
                            include "php/DB-Connection/configDB.php";

                            $sql = "SELECT job_name FROM job_roles";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['job_name'] . "'>" . $row['job_name'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No roles found</option>";
                            }

                            $conn->close();
                            ?>
                        </select>
                        <br>
                        <br>
                        <input class="button" type="submit" value="Register">
                    </form>
                </div>
            </div>
        </div>