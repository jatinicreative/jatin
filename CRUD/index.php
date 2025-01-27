
<html>
    <head>
        <title>CRUD OPERATIONS</title>
    </head>
    <body>
        <?php 
        include 'db.php';
        include 'nav.html'; ?>
        <h1> User Form..</h1>

        <form action="add.php" method="POST" enctype="multipart/form-data">
            <label>First Name :-</label>
            <input type="text" name="first_name" required><br><br>

            <label>Last Name :-</label>
            <input type="text" name="last_name" required><br><br>

            <label>Email :-</label>
            <input type="email" name="email" required><br><br>

            <label>Password :-</label>
            <input type="password" name="password" id="password" onkeyup="validation()" required><br><br>

            <label>Confirm Password :-</label>
            <input type="password" name="confirmpassword" id="confirmpassword" onkeyup="validation()" required>
            <span id='message'></span><br><br>

            <label>Profile Image :-</label>
            <input type="file" name="file" accept="image/*"/><br><br>

            <label>Address :-</label>
            <input type="textarea" name="address" required><br><br>

            <label>Phone No :-</label>
            <input type="tel" name="phone" required><br><br>

            <label>Gender :-</label>
            <input type="radio" name="gender" value="male" >Male
            <input type="radio" name="gender" value="female" >Female<br><br>

            <label>Hobby :-</label>
            <input type="checkbox" name="hobby[]" value="music" >Music
            <input type="checkbox" name="hobby[]" value="dance" >Dance
            <input type="checkbox" name="hobby[]" value="coding" >Coding<br><br>

            <label>Country :-</label>
            <select name="country">
                <option value="India">India</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Sri Lanka">Sri Lanka</option>
            </select><br><br>   

            <input type="submit" name="add" value="SUBMIT">

        </form>
    <footer>
    <script>
            function validation(){
                if(document.getElementById("password").value == document.getElementById("confirmpassword").value)
                {
                    document.getElementById('message').style.color = 'green';
                    document.getElementById('message').innerHTML = 'matching';
                } else {
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = 'not matching';
              }

            }
        </script>
    </footer>
    </body>
</html>