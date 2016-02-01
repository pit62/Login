# Login
**Managing Login Users with php, javascript and sql**
This code allows you to manage user registration and login to your own website.

'Before run the code you must update the Database connection credentials in dbClass.php.'

The first access will show the 'All users' links and the 'Register' link.

##Register

When you access to Registration page it will ask for your User name, Email and Password.

With registration will be updated:
    Users table in database
        USER_NAME
        EMAIL
        DATE_TIME
        PASS in md5 format
        UID univocal value for current user in md5 format

The UID values is updated in client browser cookie also, the cookie validity is set to one year.

When client access, the cookie allows to recognize that the registration has already occurred and as a result do not show its link,
it will be show the 'Unsubscribe' link instead.

After Registration browser will show 'All user', 'Login' and 'Unsubscribe' links.

##Unsubscribe
Unsubscribe page will delete the cookie writed and 'User name + Uid' associated in Users table.

##Login
When you access to Login the User name and Password introduced with the Uid present in the cookie will be compared with the data in the database.
If recognized table Session will be updated:
    UID
    USER_NAME
    CREATION_DATE

After Login browser will show 'All user', 'Logged users pages' and 'Logout' links.
This status will not change until it is logged out.

##Logout
The Logout page will delete the references recorded in Session table, but Registration will be 
kept in memory by the cookie until the total Unsubscription.

