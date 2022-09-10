# Cosc349Assignment1
## Eliot Luna 
## September 2022


## Getting started
Clone gitlab project, cd into project directory, vagrant up. 

Note: 
You will need to have Vagrant and VirtualBox installed, and if you run into issues because of version incompatibility between the two you will 
need to read the error messages and get versions which are compatible with each other.
If there is a .vagrant folder present then you may run into a VirtualBox UID issue, so ensure you delete the .vagrant folder before attempting to vagrant up. (.vagrant folder is removed for the commit which is stated in this report, but not in previous versions) 

## My Application - Summary
My Application is a webpage with “To do activity” generator. Click a button and it will give you a random activity from a list of activities stored in a (vm) database. You can also add your own activities, which will be inserted into the database vm. You can also view the contents of the activities database. 

There is a separate vm for administrative access, from which you can remove activities from the database.  

## Virtual Machines
My webpage links 3 VM's:

A vm for the website.  

A vm for administrative access. Can remove options added by user. Requires user to login. 

A vm for the database. This will store the activities. 

The website and admin site both access the database through MYSQL and php. 

## Note to Future Developers
I am new to web development, and the webpages I made do not use CSS, but you should be able to swap out my php files with your own. 
You will simply have to place them into the www folder for the webserver, and the adminwww folder for the adminserver.
You can also modify the contents of the MYSQL database by changing the setup-database.sql file.
