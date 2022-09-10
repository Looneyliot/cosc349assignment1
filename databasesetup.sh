#!/bin/bash

# Update Ubuntu software packages.
apt-get update
      
# Define some shell variables needed for database.
export DB_HOST='localhost'
export DB_NAME='webdatabase'
export DB_USER='root'
export DB_PWD='root'

export MYSQL_PWD='root'

# Ensure MYSQL does not ask for password on installation
echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections 
echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections

# Install the MySQL database server.
apt-get -y install mysql-server


# First create a database.
echo "CREATE DATABASE $DB_NAME;" | mysql

# Then create a database user with the given password.
echo "CREATE USER '$DB_USER'@'%' IDENTIFIED BY '$DB_PWD';" | mysql

# Grant all permissions to the database user 
echo "GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'%'" | mysql

export MYSQL_PWD='root'

# Run a sql script to setup the database
cat "/vagrant/setup-database.sql" | mysql -u $DB_USER $DB_NAME

# Allow access to database from outside hosts.
sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf

# We then restart the MySQL server
service mysql restart
