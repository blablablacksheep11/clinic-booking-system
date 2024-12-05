This is a clinic booking system, that aims to digitalize the process of online appointment making.
language and framework: html,css,javascript,jquery (ajax), php

To run this code, a phpmailer is required as all the notification features will be carried out in form of email.
Composer need to be installed before running this project code (for installing the phpmailer).  https://getcomposer.org/download/
After install, go the the device file explorer, change the view to "view hidden item". Go to C drive, Program Data/ComposerSetup/bin, copy the path and paste it at the device environment path.

!!! There might be a possibility that the mailer is not working or there are error in the mailer code due to device changing. 
So, to fix the problem above, the reader will need to:
1. open the code file in vscode
2. delete the vendor folder, composer.json, composer.lock
3. open the cmd of vscode (ctrl + backtick)
4. paste the following command:  composer require phpmailer/phpmailer
5. save the entire code file

!!! A xampp server is required to run this project https://www.apachefriends.org/

Database setup:
1. go to phpmyadmin (open the xampp application and click the admin button beside MySQL)
2. create a table named : clinic-booking-system
3. open the query interface
4. paste the sql statement one by one (the sql file is included in the code file)

Finally, you can run the code now!!! *make sure that the code file is placed in C:\xampp\htdocs*
1. open the xampp Apache and MySQL
2. go the your web browser, enter: localhost/clinic-booking-system/authentication/signin.php

The first interface the user will meet is the sign in interface. There will be 2 hypertext, 1 for forgot password, 1 for sign up. The sign up feature is only available for the patient but not the doctor adn administrator.
The forgot password feature is open for all. All the 3 entities will be using the same sign in interface. The email address will be the key that identify the role of the user (the email address is also one of the user primary key)
!!! The system only support @gmail.com, @outlook.com, @segi4u.my, $segi.edu.my
!!! The user might not receive any email if they using @outlook.com, organizational email
!!! kindy check the junk email if not receiving email notification

Patient module:
1. Appointment (create appointment / appointment request)
2. Schedule (view and delete appointment)
3. Profile (edit personal information)

Doctor module:
1. Schedule (View and delete appointment)
2. Request (Approve and reject appointment request from the patient)
3. Profile (Edit personal information)

Administrator module:
1. Doctor (manage registered doctor)
2. Patient (manage registered patient)
3. Appointment (manage appointment)
4. Request (accept and reject delete appointment request from doctor)

