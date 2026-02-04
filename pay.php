<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="/alumni-site/styles/css/bulma.css">
    <link rel="icon" href="/alumni-site/img/WhatsApp Image 2022-06-22 at 9.09.06 PM.jpeg" type="image/icon type">
    <link rel="stylesheet" href="/alumni-site/styles/css/style.css">
</head>

<style>
    .about-container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 2rem;
      
      }
      .about-container-logo img{
        max-width: 300px;
        height: 200px;
        border-radius: 10%;
        
      }
      
      .about-container-logo-text{
        max-width: 400px;
      }
      .about-container-logo-text h1{
        font-weight: 900;
        font-size: 3rem;
      }
</style>

<body style="background-color: #ffff";>
    <div class="about-container">
        <div class="about-container-logo">
            <img src="/alumni-site/img/WhatsApp Image 2022-06-22 at 9.09.06 PM.jpeg" alt="">
        </div>
        <div class="about-container-logo-text">
            <h1>Payment</h1>
        </div>
    
    
      <form id="paymentForm">
        <div class="field">
          <label class="label"></label>
          <div class="control has-icons-left has-icons-right">
            <input class="input is-success" type="text" id = "first-name" placeholder="First name" value="">
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
            <span class="icon is-small is-right">
              <i class="fas fa-check"></i>
            </span>
          </div>
          <p class="help is-success"></p>
        </div>
        
        <div class="field">
          <label class="label"></label>
          <div class="control has-icons-left has-icons-right">
            <input required class="input is-success" type="text" id ="last-name" placeholder="Last name" value="">
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>
            <span class="icon is-small is-right">
              <i class="fas fa-exclamation-triangle"></i>
            </span>
          </div>
          <p class="help is-danger"></p>
        </div>

        <div class="field">
            <label class="label"></label>
            <div class="control has-icons-left has-icons-right">
              <input required class="input is-success" type="email" id = "email-address" placeholder="@email.com" value="">
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            </div>
            <p class="help is-danger"></p>
          </div>
          <div class="buttons">
              <button type="submit" class="button is-link">Pay</button>
          </div>
      </div>
    </form>
<script src="https://js.paystack.co/v1/inline.js"></script>



<script>
const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_live_e5d793a7cedb6480854c1d63634ce472275f1847', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: 1500 * 100,
    firstname: document.getElementById("first-name").value,
    lastname: document.getElementById("last-name").value,
    ref: 'BOSA'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function() {
        window.location = "http://localhost/alumni-site/dashboard.php?transaction=call";
      alert('Transaction cancelled.');
    },
    callback: function(response) {
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
      window.location = "http://localhost/alumni-site/verify_transaction.php?reference="+ response.reference;
    }
  });

  handler.openIframe();
}
</script>


</body>
</html>