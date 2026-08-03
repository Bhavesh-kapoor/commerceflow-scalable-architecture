import Redis from "ioredis";

// create host  
let redis = new Redis({
    host:"commerceflow-redis",
    port:6379
})

// make connection with redis
redis.on("connect",()=>{
    console.log("redis server  connected")
})

export default redis    