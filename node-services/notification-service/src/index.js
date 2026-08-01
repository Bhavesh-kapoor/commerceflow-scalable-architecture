import express from 'express'
import dotenv from 'dotenv'
dotenv.config()
const app = express()


app.get('/',(req,res)=>{
    res.send("notification service is running")
})
const PORT = process.env.PORT
app.listen(PORT,()=>{
    console.log(`server is running on http://localhost:${PORT} `)
})