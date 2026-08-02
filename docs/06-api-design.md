Authentication APIs Design

API 1
Send OTP
POST /api/v1/auth/send-otp

Request
{
    "identifier":"bhavesh@gmail.com"
}


VALIDATION
1. identifier is required
2. Detect whether identifier is email or phone
3. Validate email/phone format
4. Check if identifier is blocked
5. Check resend cooldown (30 seconds)
6. Check maximum resend limit

SUCCESS
{
    "success": true,
    "message": "OTP sent successfully.",
    "data": {
        "expires_in": 300,
        "resend_after": 30
    }
}


Failure
{
 success: false,
 message : "failed to send otp"

}

API 2
Verify OTP
POST /api/v1/auth/verify-otp
{
    "identifier":"bhavesh@gmail.com",
    "otp":"123456"
}

VALIDATION
1. identifier required
2. otp required
3. otp must be 6 digits
4. otp exists
5. otp expired?
6. max attempts exceeded?
7. otp matches?
8. already used?

SUCCESS
{
    "success": true,
    "message": "Authentication successful.",
    "data": {
        "access_token": "...",
        "refresh_token": "...",
        "user": {
            "id": "...",
            "name": "Bhavesh Kapoor"
        }
    }
}


API 3
Resend OTP
POST /api/v1/auth/resend-otp

Request

{
    "identifier":"bhavesh@gmail.com"
}

VALIDATION
1. identifier required
2. cooldown finished?
3. resend limit reached?
4. existing OTP expired?




OTP exists?

↓

No

↓

Generate OTP

↓

Yes

↓

Expired?

↓

Yes

↓

Generate New OTP

↓

No

↓

Resend Same OTP

API 4
Logout
POST /api/v1/auth/logout






                AuthController
                       │
                       ▼
                AuthService
                       │
        ┌──────────────┼──────────────┐
        ▼              ▼              ▼
   OTPService     UserService     JWTService
        │              │              │
        └──────────────┼──────────────┘
                       ▼
               NotificationService
                       │
          ┌────────────┴────────────┐
          ▼                         ▼
     Email Provider           SMS Provider
