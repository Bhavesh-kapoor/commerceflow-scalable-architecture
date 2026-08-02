import express from 'express'
import APP_CONFIG from './utils/config.utils.js'
import redis from './connection/redis.connection.js'
const app = express()

// for  json
app.use(express.json())


app.get('/',(req,res)=>{
    res.send("notification service is running")
})

// testing route for email 
app.post("/send-email",(req,res)=>{
    // get body data 
    redis.lpush(
        "email-queue",
        JSON.stringify(req.body)
    )
    return res.status(200).json(
        {   status:true,
            message: "Job pushed to Redis"
             
        },

    )
})
const PORT = APP_CONFIG.PORT
app.listen(PORT,()=>{
    console.log(`server is running on http://localhost:${PORT} `)
})