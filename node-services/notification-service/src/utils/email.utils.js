import nodemailer from 'nodemailer'

//  create transport
const transport = nodemailer.createTransport({
    host:"mailhog",
    port:1025,
    secure: false, // Must be false for port 1025

})

export default transport