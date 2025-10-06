<!DOCTYPE html> <!-- Declares that this is an HTML5 document -->
<html>
<head>
    <title>CSRF Protection Demo</title> <!-- Browser tab title -->

    <style>
        /* Body styling: center content vertically & horizontally, light background */
        body {
            font-family: Arial, sans-serif; /* Font style for the page */
            background-color: #f4f7f8; /* Light grey-blue background */
            display: flex; /* Use flexbox for layout */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100vh; /* Full viewport height */
            margin: 0; /* Remove default margin */
        }

        /* Main container box styling */
        .container {
            background: #fff; /* White background */
            padding: 30px 40px; /* Inner spacing */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 10px 25px rgba(0,0,0,0.1); /* Soft shadow */
            text-align: center; /* Center text inside container */
            width: 350px; /* Fixed width */
        }

        /* Heading styling */
        h1 {
            color: #333; /* Dark grey text */
            margin-bottom: 20px; /* Space below heading */
        }

        /* Text input field styling */
        input[type="text"] {
            width: 90%; /* Almost full width */
            padding: 10px; /* Inner spacing */
            margin: 10px 0; /* Space above and below input */
            border: 1px solid #ccc; /* Light border */
            border-radius: 5px; /* Rounded corners */
        }

        /* Submit button styling */
        button {
            padding: 10px 25px; /* Button size */
            background-color: #3490dc; /* Blue background */
            border: none; /* Remove default border */
            border-radius: 5px; /* Rounded corners */
            color: white; /* Text color */
            cursor: pointer; /* Show pointer on hover */
            font-size: 16px; /* Font size */
        }

        /* Button hover effect */
        button:hover {
            background-color: #2779bd; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <div class="container"> <!-- Main box container -->
        <h1>CSRF Protection Demo</h1> <!-- Form title -->

        <!-- Form sends data safely using POST method to /submit-demo route -->
        <form method="POST" action="/submit-demo">
            <?php echo csrf_field(); ?> <!-- Laravel CSRF token to prevent cross-site request forgery -->

            <!-- Name input field -->
            <input type="text" name="name" placeholder="Enter your name" required><br>

            <!-- Submit button -->
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\dashboard\sample-laravel\resources\views/welcome.blade.php ENDPATH**/ ?>