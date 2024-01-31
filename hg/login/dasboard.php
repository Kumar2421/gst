<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <style>
        #main-content {
            float: right;
            width: 82%;
        }

        .payment-container {
            padding: 20px;
            text-align: center;
            text-transform: capitalize;
        }

        h1.payment-head {
            margin-bottom: 20px;
        }

        .text-dark th {
            padding: 10px;
            background-image: radial-gradient( circle farthest-corner at 50.7% 54%, rgba(204,254,152,1) 0%, rgba(229,253,190,1) 92.4% );
        }

        .text-body th {
            padding: 20px;
        }

        .text-body td {
            padding-top: 20px;
        }

        span.green {
            font-size: 14px;
            background-color: rgb(48, 204, 17);
            padding: 5px;
            border-radius: 5px;
            color: white;
        }

        span.danger {
            font-size: 14px;
            background-color: rgb(230, 38, 38);
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
    <div class="container-xxl" id="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="payment-container">
                            <h1 class="payment-head">recent payments</h1>
                            <table class="table">
                                <thead class="text-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>price</th>
                                        <th>date</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-body">
                                    <tr>
                                        <th>1</th>
                                        <td>surya</td>
                                        <td>$6000</td>
                                        <td>12-01-2024</td>
                                        <td><span class="green">approved</span><i class="fa-solid fa-check-double" style="color: #20b839;padding-left: 10px;"></i></td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>mohanraja</td>
                                        <td>$7000</td>
                                        <td>13-01-2024</td>
                                        <td><span class="danger">pending</span><i class="fa-solid fa-clock" style="color: #ec4a2d;padding-left: 10px;"></i></td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td>boopathiraja</td>
                                        <td>$8000</td>
                                        <td>14-01-2024</td>
                                        <td><span class="green">approved</span><i class="fa-solid fa-check-double" style="color: #20b839;padding-left: 10px;"></i></td>
                                    </tr>
                                    <tr>
                                        <th>4</th>
                                        <td>kirubha</td>
                                        <td>$9000</td>
                                        <td>15-01-2024</td>
                                        <td><span class="danger">pending</span><i class="fa-solid fa-clock" style="color: #ec4a2d;padding-left: 10px;"></i></td>
                                    </tr>
                                    <tr>
                                        <th>5</th>
                                        <td>joes</td>
                                        <td>$8500</td>
                                        <td>16-01-2024</td>
                                        <td><span class="green">approved</span><i class="fa-solid fa-check-double" style="color: #20b839;padding-left: 10px;"></i></td>
                                    </tr>
                                    <tr>
                                        <th>6</th>
                                        <td>vignesh</td>
                                        <td>$8000</td>
                                        <td>14-01-2024</td>
                                        <td><span class="green">approved</span><i class="fa-solid fa-check-double" style="color: #20b839;padding-left: 10px;"></i></td>
                                    </tr>
                                    <tr>
                                        <th>7</th>
                                        <td>boopathiraja</td>
                                        <td>$8000</td>
                                        <td>14-01-2024</td>
                                        <td><span class="green">approved</span><i class="fa-solid fa-check-double" style="color: #20b839;padding-left: 10px;"></i></td>
                                    </tr>
                                    <tr>
                                        <th>8</th>
                                        <td>kirubha</td>
                                        <td>$9000</td>
                                        <td>15-01-2024</td>
                                        <td><span class="danger">pending</span><i class="fa-solid fa-clock" style="color: #ec4a2d;padding-left: 10px;"></i></td>
                                    </tr>
                                    <tr>
                                        <th>9</th>
                                        <td>joes</td>
                                        <td>$8500</td>
                                        <td>16-01-2024</td>
                                        <td><span class="green">approved</span><i class="fa-solid fa-check-double" style="color: #20b839;padding-left: 10px;"></i></td>
                                    </tr>
                                    <tr>
                                        <th>10</th>
                                        <td>vignesh</td>
                                        <td>$8000</td>
                                        <td>14-01-2024</td>
                                        <td><span class="green">approved</span><i class="fa-solid fa-check-double" style="color: #20b839;padding-left: 10px;"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Pagination -->
                <div class="pagination-container">
                    <ul class="pagination" id="pagination">
                        <li class="page-item"><a class="page-link" href="#" onclick="showRows(0, 3)">1</a></li>
                        <li class="page-item"><a class="page-link" href="#" onclick="showRows(3, 6)">2</a></li>
                        <li class="page-item"><a class="page-link" href="#" onclick="showRows(6, 10)">3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
           showRows(0, 3);
        });
        function showRows(startIndex, endIndex) {
            $('.text-body tr').hide();
            $('.text-body tr').slice(startIndex, endIndex).show();
        }
    </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
