import { createQR} from '@solana/pay';

const SOLANA_PAY_URL="solana:https://github.com/abramaleko";

const qr=createQR(SOLANA_PAY_URL,300,'white','red');
const qrContainer = document.getElementById('qr-container');
qr.append(qrContainer);




