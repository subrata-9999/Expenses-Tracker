<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <div class="container">
        <h1>Welcome to the Dashboard</h1>
        <div class="user-info">
            <p>User Information:</p>
            <ul>
                <li>User ID: <?= session()->get('user_id', 'N/A') ?></li>
                <li>User Email: <?= session()->get('user_email', 'N/A') ?></li>
                <li>User Username: <?= session()->get('user_username', 'N/A') ?></li>
            </ul>
        </div>
        <form action="/logout" method="post">
            <button type="submit">Logout</button>
        </form>

        <a href="/add-expenses" class="button">Add Expenses</a>

        <form action="/dashboard" method="get">
            <button class="button">Show All Expenses</button>
        </form>

        <form action="/dashboard" method="post" class="filter-form">
            <label for="startDate">Start Date/Time:</label>
            <input type="datetime-local" id="startDate" name="startDate">

            <label for="endDate">End Date/Time:</label>
            <input type="datetime-local" id="endDate" name="endDate">

            <button class="button">Submit</button>
        </form>

        <?php
    $totalExpenses = 0; // Initialize $totalExpenses here
?>
<table border='1'>
    <tr>
        <th>Title</th>
        <th>Amount</th>
        <th>Description</th>
        <th>Created At</th>
    </tr>
    <?php foreach ($expenses as $expense): ?>
        <tr>
            <td><?= $expense['title'] ?></td>
            <td>
                <?= $expense['amount']; ?>
                <?php
                    $totalExpenses = $totalExpenses + $expense['amount'];
                ?>
            </td>
            <td><?= $expense['description'] ?></td>
            <td><?= $expense['created_at'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<p class="total-expenses">Total expenses: <?= $totalExpenses ?></p>

    </div>
</body>

</html>