<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <link rel="stylesheet" href="payment_page.css">
</head>
<body>
    <div class="container p-0">
        <div class="card px-4">
            <p class="h8 py-3">Payment Details</p>
            <form action="process_payment.php" method="POST">
                <div class="row gx-3">
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Person Name</p>
                            <input class="form-control mb-3" type="text" name="name" placeholder="Name" value="">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Card Number</p>
                            <input class="form-control mb-3" type="text" name="card_number" placeholder="1234 5678 435678">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Expiry</p>
                            <input class="form-control mb-3" type="text" name="expiry" placeholder="MM/YYYY">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">CVV/CVC</p>
                            <input class="form-control mb-3 pt-2" type="password" name="cvv" placeholder="*">
                        </div>
                    </div>
                    <input type="hidden" name="violation_id" value="<?php echo $_GET['id']; ?>">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mb-3">
                            Pay
                            <span class="fas fa-arrow-right"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>