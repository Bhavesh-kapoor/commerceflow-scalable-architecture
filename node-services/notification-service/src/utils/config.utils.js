import dotenv from 'dotenv'
dotenv.config()

const  APP_CONFIG={
    "PORT": process.env.PORT || 3000,
    "EMAIL_FROM":process.env.FROM
}

export default APP_CONFIG