<?php
session_start();

// Set your admin password here
$ADMIN_PASSWORD = "msic2025!admin";

if(isset($_POST['password'])){
    if($_POST['password'] === $ADMIN_PASSWORD){
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Incorrect password.";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Admin Login</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 shadow-lg rounded-xl w-96">
        <h2 class="text-2xl font-bold mb-5 text-center">MSIC Admin Login</h2>

        <?php if(!empty($error)) echo "<p class='text-red-600 mb-3'>$error</p>"; ?>

        <form method="post">
            <label class="font-semibold">Password</label>
            <input type="password" name="password" 
                   class="w-full p-3 border rounded-lg mt-2" required>

            <button class="mt-4 w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700">
                Login
            </button>
        </form>
    </div>
</div>

</body>
</html>
