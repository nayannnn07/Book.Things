<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>
<body>
    
<button type="button" name="payWithKhalti" id="payment-button" class="orange-button">Pay with
              Khalti</button>
</body>
<script>
    // admin.khalti.com ko test public key use garya
    var config = {
      // replace the publicKey with yours
      "publicKey": "test_public_key_6b6a8c6d85564ddf9fc487b2d383b7cb",
      "productIdentity": "1234567890",
      "productName": "Dragon",
      "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
      "paymentPreference": [
        "KHALTI",
        // "EBANKING",
        // "MOBILE_BANKING",
        // "CONNECT_IPS",
        // "SCT",
      ],
      "eventHandler": {
        onSuccess(payload) {
          // hit merchant api for initiating verfication
          console.log(payload);
          // Redirect to the orderPlaced1.php page with updated parameters
          window.location.href = 'userHome.php';
        },
        onError(error) {
          console.log(error);
        },
        onClose() {
          console.log('widget is closing');
        }
      }
    };

    var checkout = new KhaltiCheckout(config);
    var btn = document.getElementById("payment-button");
    btn.onclick = function () {
      // minimum transaction amount must be 10, i.e 1000 in paisa.
      checkout.show({ amount: <?php echo "200"; ?> * 100 });
    }
  </script>

</html>