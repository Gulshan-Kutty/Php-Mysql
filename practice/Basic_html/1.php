<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
</head>
<body>
    <h2>This is HTML forms tutorial</h2>
    <form action="" method="POST">

        <!-- <div>
            Name:<input type="text" name="name">
        </div> -->
        <label for="name">Name:</label>
        <div>
            <input type="text" name="name" id="name">
        </div>
        <br>
        <div>
            Role: <input type="text" name="role">
        </div>      
        <br>
        <div>
            Email: <input type="email" name="email">
        </div>
        <br>
        <div>
            Date: <input type="date">
        </div>
        <br>
        <div>
            Bonus: <input type="number" id="bonus" required>
        </div>
        <br>
        <div>
           Write About Yourself:<br><textarea name="mytext" id="" cols="30" rows="4"></textarea>
        </div>
        <br>
        <label for="check"> Are you eligible?: </label>
        <div>
            <input type="checkbox" name="check" id="check" checked>
        </div>
        <br>
        <div>
            Gender: Male <input type="radio" name="gender">
            Female <input type="radio" name="gender" checked>
        </div>
        <br>
        <div>
            <input type="submit" value="Submit Now">
        </div>
        <br>
        <!-- <div>
            <button type="submit">Submit Now</button>
        </div>
        <br> -->
        <div>
            <input type="reset" value="Reset Now">
        </div>
        <br>
        <label for="car"></label>
        <div>
           <select name="car" id="car">
               <option value="indica">Indica</option>
               <option value="swift">Swift</option>
               <option value="innova" selected >Innova</option>
               <option value="fortuner">Fortuner</option>
               </select>
        </div>
    </form>
</body>
</html>