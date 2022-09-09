#!/bin/bash

# Update Ubuntu software packages.
apt-get update
      
# Define some shell variables needed for database.
export DBHOST='localhost'
export DBNAME='webdatabase'
export DBUSER='root'
export DBPASSWD='root'

export MYSQL_PWD='root'

# Ensure MYSQL does not ask for password on installation
echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections 
echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections

# Install the MySQL database server.
apt-get -y install mysql-server


# First create a database.
echo "CREATE DATABASE $DBNAME;" | mysql

# Then create a database user with the given password.
echo "CREATE USER '$DBUSER'@'%' IDENTIFIED BY '$DBPASSWD';" | mysql

# Grant all permissions to the database user 
echo "GRANT ALL PRIVILEGES ON $DBUSER.* TO '$DBUSER'@'%'" | mysql



# Run a sql script to setup the database
cat "setup-database.sql" | mysql -u $DBUSER $DBNAME

# Allow access to database from outside hosts.
sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf

# We then restart the MySQL server
service mysql restart
