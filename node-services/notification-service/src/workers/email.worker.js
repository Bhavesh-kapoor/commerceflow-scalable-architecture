import redis from "../connection/redis.connection.js";
import APP_CONFIG from "../utils/config.utils.js";
import transport from "../utils/email.utils.js";

console.log("Worker started...");

while(true){
    let response = await redis.brpop("email-queue",0);
    let data = JSON.parse(response[1]);
    // create mail options 
    const MAILOPTIONS={
        from:`commerce flow  <${APP_CONFIG.EMAIL_FROM}>`,
        to :data.email,
        subject:"testing mail",
        text:"<h1>hey bro this is  testing  mail from commerceflow"
    }

    await transport.sendMail(MAILOPTIONS)
    console.log("email sent to ", data.email)
    

}