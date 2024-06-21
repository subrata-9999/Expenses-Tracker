<?php include('component/header.php'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <form action="/addExpenses" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" value="<?= old('title') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount:</label>
                    <input type="number" id="amount" name="amount" class="form-control" value="<?= old('amount') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" id="description" name="description" class="form-control" value="<?= old('description') ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Expenses</button>
            </form>
        </div>
    </div>
</div>

<?php include('component/footer.php'); ?>


    

