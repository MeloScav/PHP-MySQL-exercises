# PHP - MySQL - exercises

Here are different exercises done in PHP and MySQL.

## Password Protected Page

In exercice 1, we need to protect a confidential page with a password.
This page contains confidential information and should not be displayed if the password is incorrect.
PS: The access password is "kangourou".

## One Page Protection

In exercise 2, we do exercise 1 but on a single php page.

## Little chat room

In exercise 3, we are going to create a small chat room with, on the same page, two small text areas, one for writing the nickname and one for writing the message.  
A "send" button will send and save information on a MySQL table.  
The last 10 messages, from the most recent to the most oldest, shoul be displayed below.

## Blog

In exercise 4, we are going to make a small blog with a systeme of news and comments.  
A news page and a comments page associated with ID news.  
There will be a form for adding new comments on the comments page as well as the management of errors for a display of a new which doesn't exist or of an absence of comments on the page.

## Member area

In exercise 5, there is the creation of a member area with a registration page, a login page and a logout page.  
Members are saved in a mysql table and the password hashed.  
Before registering, we check if the nickname of the futur member is free, if the 2 passwords are identical and if the email adress has a valid form.  
On the login page, there is the possibility of remembering the member and automatically logging in using cookies.  
The member is connected on all pages of the site with to the session variables.
