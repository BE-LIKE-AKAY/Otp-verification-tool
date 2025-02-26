# Otp-verification-tool
This PHP script automates the process of verifying OTPs against the Wheelseye OTP Verification API. It reads OTPs from a text file (otps.txt), sends verification requests for each OTP, and logs responses in a structured format.
Features
✅ Reads OTPs from otps.txt (one OTP per line).
✅ Sends each OTP to the API endpoint using cURL.
✅ Saves all responses in result/otp_responses.txt.
✅ Displays progress after every 5 OTPs.

Requirements
PHP 7+
Internet connection
cURL enabled in PHP

How to Use
1. Clone the Repository
  git clone https://github.com/your-username/otp-verification-script.git
cd otp-verification-script

2. Add OTPs to otps.txt

3. Run the Script
Ensure you have PHP installed, then execute:

4. Check the Results
After execution, all responses will be saved in:

bash
Copy
Edit
result/otp_responses.txt

5. Example Response Format (Inside otp_responses.txt)
css
Copy
Edit
OTP: 123456
Response: {"status":"success","message":"OTP verified successfully"}

OTP: 654321
Response: {"status":"failed","message":"Invalid OTP"}
