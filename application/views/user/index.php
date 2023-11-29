<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>

<body>
    <?php
    $base = __DIR__;
    include $base . '\..\layout\menu.php';
    ?>

    <a href="/user/update">
        <button class="button">Update Profile</button>
    </a>

    <form action="/user/delete" method="post">
        <button type="button" class="button" onclick="openConfirmationDialog()">Delete Account</button>
    </form>

    <dialog id="confirmationDialog">
        <p id="confirmationMessage">Are you sure you want to delete your account?</p>
        <button onclick="confirmDelete()">Yes, delete</button>
        <button onclick="closeConfirmationDialog()">Cancel</button>
    </dialog>

    <script>
        const confirmationDialog = document.getElementById('confirmationDialog');

        function openConfirmationDialog() {
            confirmationDialog.showModal();
        }

        function closeConfirmationDialog() {
            confirmationDialog.close();
        }

        function confirmDelete() {
            document.querySelector('form[action="/user/delete"]').submit();
            closeConfirmationDialog();
        }
    </script>
</body>

</html>