import { createQR,encodeURL} from '@solana/pay';

//const SOLANA_PAY_URL="https://solana-backedn.onrender.com/api/merchant";
 const SOLANA_PAY_URL="https://caycims.onrender.com/api/merchant";


const button=document.getElementById("generateQrCode")
button.addEventListener("click",function(){

    //get user-id
    var user_id=document.getElementById("user-id").value;

   //get the input value
   var amount=document.getElementById("swap-amount").value;
   if (amount == '') {
      alert("Enter amount first to generate qr code");
      return false;
   }

    const transactionRequestUrl = new URL(SOLANA_PAY_URL);
    transactionRequestUrl.searchParams.set('amount', amount.toString());
    transactionRequestUrl.searchParams.set('user_id', user_id.toString());

    // URL-encode the transaction request URL
    const encodedUrl = encodeURIComponent(transactionRequestUrl.toString());

    // Create the Solana link with the encoded URL
    const solanaLink = `solana:${encodedUrl}`;

    // Create the QR code with the encoded URL
    const qr = createQR(solanaLink, 250, 'white', 'red');

    //shows the qr code
    const qrContainer = document.getElementById('qr-container');
    qr.append(qrContainer);
    document.getElementById("qr-code-col").style.display="block";

    //disables the input
    button.setAttribute("disabled","true");
});






