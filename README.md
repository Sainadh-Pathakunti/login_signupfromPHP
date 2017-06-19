Now I explain in detail how the program works in a simple way.


My system:
==========
OS: Windows 8
Local server: XAMPP
Database: MySQL
Framework: php
Text editor: Notepad++


PART A: How I Install xampp server
==========================================================

Step 1: xampp Installation
==================================

i)	Download and install the xampp via link.

Download Web Link: https://www.apachefriends.org/index.html


ii)Next, extract the .zip file and install xampp to the Web-accessible folder (eg: \htdocs).
iv)	After extraction, the project folder should have named 'basic'.

Directory installation: C:\xampp\htdocs\test\



Step 2: MYSQL Server Installation
==================================

i)	After,installation xampp 
ii) open link 


Link: http://localhost/phpmyadmin/

iii)Next, import the .sql file 



Step 3: Testing
================

i)	Test the system:
http://localhost/test/


PART B: How the Program Works
=============================

Create a user
=============

1.	On the index page, click the 'sign up' link.
2.	This will redirect to the 'sign up' page.
3.	In the 'signup.php' file, the line of code below will render.
4.  Now register with username and password

login user
===========

1.	In the index.php file, Now you can user your username and password to login

Create a task
=============

1.	On the index page, in the last column of the row of the selected task, click on the 'create' icon or text.
2.	It will redirect to the 'create' page using the task USERID as the argument.
3.	In the CREATE.php file, the lines of code will create task

view all task
=============

1. On the index page, in the last column of the row of the selected task, click on the 'view' icon or text
2. In the view.php file, the lines of code will show all the tasks that are created by user.

Edit a task
=============

1. On the index page, in the last column of the row of the selected task, click on the 'view' icon or text
2. In the view.php file, the lines of code below will edit task 'edit' button is triggered task can be editable.


Delete a task
=============

1. On the index page, in the last column of the row of the selected task, click on the 'Delete' icon or text
2. In the view.php file, the lines of code below will show a confirm message when any 'Delete' button is triggered.
