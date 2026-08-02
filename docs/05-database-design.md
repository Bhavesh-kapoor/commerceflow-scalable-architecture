TABLES 

1. users
   - id 
   - uuid
   - name 
   - email
   - phone
   - phone_verified_at
   - email_verified_at
   - phone_country_code
   - status
   - last_login_at
   - last_login_device
   - last_login_ip
   - profile_photo
   - created_at
   - updated_at
   - deleted_at

2.  otps
   - id
   - user_id
   - identifier [email ,phone]
   - identifier_type
   - otp
   - purpose [ login, register, email_verification, phone_verification]       
   - channel
   - attempts
   - expires_at
   - created_at
   - updated_at
