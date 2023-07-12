import { createQR} from '@solana/pay';

const SOLANA_PAY_URL="solana:https://github.com/abramaleko";

const qr=createQR(SOLANA_PAY_URL,300,'white','black');
const qrImg = document.getElementById('qr-code');
var imgSrc=qr._qr.createDataURL(100,20);
qrImg.setAttribute("src",imgSrc);



