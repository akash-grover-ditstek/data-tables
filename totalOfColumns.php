<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datatable</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css' integrity='sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==' crossorigin='anonymous' />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">


    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js' integrity='sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js' integrity='sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==' crossorigin='anonymous'></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

</head>

<body>
    <table class="table table-bordered" id='dataTable'>
        <thead>
            <tr>
                <th>#</th>
                <th>Gas</th>
                <th>Grocery</th>
                <th>Electricity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 1; $i <= rand(20,90); $i++) {
                echo "
                    <tr>
                    <td>{$i}</td>
                    <td>" . rand(100, 400) . "</td>
                    <td>" . rand(500, 2000) . "</td>
                    <td>" . rand(800, 10000) . "</td>
                    </tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Totals</th>
                <th>0</th>
                <th>0</th>
                <th>0</th>
            </tr>
        </tfoot>
    </table>
    <script>
        $("#dataTable").dataTable({
            "footerCallback": function(row, data, start, end, display) {
                var totalAmount = 0;
                var api = this.api();
                for ($i = 1; $i <= 3; $i++) {

                    $(api.column($i).footer()).html(
                        api.column($i).data().reduce(function(a, b) {
                            return parseInt(a) + parseInt(b);
                        }, 0)
                    );

                }
            }
        });
    </script>
</body>

</html>