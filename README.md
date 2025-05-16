# Digi-gram-portal

The Digital Grampanchayat Portal is an initiative to bring transparency, efficiency, and ease to village-level governance. Citizens can apply for certificates, view village reports, and receive important notifications — all online. Admins can manage requests, approve or reject applications, and generate government-style PDFs.

____Key Features____
Citizen Functionality
Registration & Login: Secure citizen account creation.

Certificate Requests: Apply online for:

Birth Certificate
Marriage Certificate
Death Certificate
Residential Certificate
No Objection Certificate (NOC)
Senior Citizen Certificate

Track Application Status:- Dashboard showing request status (Pending, Approved, Rejected).

Download Certificates:- If approved, download government-format PDF certificates.

Village News & Reports:- View reports of completed and ongoing village works.

Notifications:- See updates and announcements from the Gram Panchayat.

Feedback & Complaints:- Submit grievances or suggestions to the administration.


______Admin Functionality_______

Admin Login Panel

Citizen Approvals: Approve or reject new user registrations.
Manage Requests: View and process:
Birth Requests
Marriage Requests
Death Requests
Residential Requests
NOC Requests
Senior Citizen Requests

PDF Certificate Generation:- Generate approved certificates in official format using MPDF.

Notification Management:- Create, edit, and delete public announcements.

View Approved/Rejected Lists separately from pending ones.


 _______Technologies Used________
 
Frontend: HTML, CSS, JavaScript
Backend: PHP (No Framework)
Database: MySQL
PDF Generation: mPDF
Local Server: XAMPP / WAMP


_________System Modules_________

Authentication Module:- Handles user and admin login/registration.
Service Request Module:- Manages citizen applications.
Certificate Generator:- Fetches data and auto-generates PDF certificates.
Admin Dashboard:- Central admin panel for complete control.
Notification System:- Allows real-time updates to villagers.
Feedback Module:- For user interaction and improvements.


______________Application Flow______________

Citizen registers → Admin approves.

Citizen submits certificate request → Admin reviews.

If approved → Certificate is generated and downloadable in dashboard.

Status of each request is clearly shown.

Admin manages and monitors all submissions centrally.

 
 ___________How to Run Locally____________
 
Download or clone this project to your htdocs (XAMPP) or www (WAMP) folder.

Import the provided .sql file into your MySQL database.

Update your database connection in includes/db.php.

Start Apache and MySQL from XAMPP/WAMP.

Open your browser and go to http://localhost/digi-gram/.

Use the default admin credentials to manage the system:

Username: yashodip

Password: Admin@123
