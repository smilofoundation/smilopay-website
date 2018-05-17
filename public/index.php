<?php include('includes/header.php'); ?>
<div class="blockBanner">
    <ul>
        <li>Smilo Price: 0.25$</li>
        <li>SmiloPay Price: ...</li>
        <li>Block time: 16 Sec</li>
    </ul>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 smilopayCalculator">
            <div class="center">
                <h1>SmiloPay reward</h1>
                <div class="form-group">
                    <p>How many Smilo tokens do you own?</p>
                    <input type="number" class="form-control smiloPayCalcInput" id="amountSmilo" name="amountSmilo" oninput="updateXspCalculator()" value="1000"><br>
                    <p>Calculate your SmiloPay reward.</p>
                </div>
            </div>

            <table class="table table-striped">
                <tr>
                    <th>Time</th>
                    <th>SmiloPay</th>
                    <th>USD value</th>
                    <th>EUR value</th>
                </tr>
                <tr class="tableRowInfo">
                    <td>Block</td>
                    <td id="calcBlock"></td>
                    <td>...</td>
                    <td>...</td>
                </tr>
                <tr class="tableRowInfo">
                    <td>Day</td>
                    <td id="calcDay"></td>
                    <td>...</td>
                    <td>...</td>
                </tr>
                <tr class="tableRowInfo">
                    <td>Week</td>
                    <td id="calcWeek">
                    <td>...</td>
                    <td>...</td>
                </tr>
                <tr class="tableRowInfo">
                    <td>Month</td>
                    <td id="calcMonth"></td>
                    <td>...</td>
                    <td>...</td>
                </tr>
                <tr class="tableRowInfo">
                    <td>Year</td>
                    <td id="calcYear"></td>
                    <td>...</td>
                    <td>...</td>
                </tr>
            </table>
        </div>
    </div>
</div>

</body>
<?php include('includes/footer.php'); ?>

<script>
    // Load first time
    updateXspCalculator()

    function updateXspCalculator(){
        var amountSmilo = document.getElementById("amountSmilo").value;
        if(amountSmilo >= 200000000){
            amountSmilo = 200000000;
            document.getElementById("amountSmilo").value = amountSmilo;
        }

        var calcDay = 0.00054;
        var calcBlock = 0.0000001

        document.getElementById("calcBlock").innerHTML = toFixed(amountSmilo*calcBlock);
        document.getElementById("calcDay").innerHTML = toFixed((amountSmilo*calcDay));
        document.getElementById("calcWeek").innerHTML = toFixed((amountSmilo*calcDay*7));
        document.getElementById("calcMonth").innerHTML = toFixed((amountSmilo*calcDay*365/12));
        document.getElementById("calcYear").innerHTML = toFixed((amountSmilo*calcDay*365));
    }

    function toFixed(x) {
        if (Math.abs(x) < 1.0) {
            var e = parseInt(x.toString().split('e-')[1]);
            if (e) {
                x *= Math.pow(10,e-1);
                x = '0.' + (new Array(e)).join('0') + x.toString().substring(2);
            }
        } else {
            var e = parseInt(x.toString().split('+')[1]);
            if (e > 20) {
                e -= 20;
                x /= Math.pow(10,e);
                x += (new Array(e+1)).join('0');
            }
        }
        x = Number.parseFloat(x).toFixed(8);
        return x;
    }
</script>