# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  #I have used this box in the past, so all 3 vms will use this box.
  config.vm.box = "ubuntu/focal64"

  #Configuring the webserver
  config.vm.define "webserver" do |webserver|
    webserver.vm.hostname = "webserver"
    
    # Port forwarding. Host can reach the webserver at 127.0.0.1:8080, 
    # request will reach webserver's port 80.
    webserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
    
    # Set up a private network 192.168.56.11 that the VMs will use to communicate
    # with each other. 
    webserver.vm.network "private_network", ip: "192.168.56.11"

    # The following line is for the CS Labs
    webserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    # Provision the webserver 
    webserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      #install apache2 webserver
      apt-get install -y apache2 php libapache2-mod-php php-mysql

      # Change VM's webserver's configuration to use shared folder.
      # (Look inside user-site.conf for specifics.)
      cp /vagrant/user-site.conf /etc/apache2/sites-available/

      # Activate our website configuration
      a2ensite user-site    
      # disable the default website provided with Apache
      a2dissite 000-default
      # Restart the webserver to pick up our configuration changes
      service apache2 reload
    
    SHELL
 
  end

  #Configuring the database 
  config.vm.define "dbserver" do |dbserver|
    dbserver.vm.hostname = "dbserver"
    # Set up a private network 192.168.56.12 that the VMs will use to communicate
    # with each other. 
    dbserver.vm.network "private_network", ip: "192.168.56.12"

     # The following line is for the CS Labs
    dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
    
    # Run MySQL startup script 
    dbserver.vm.provision "shell", path: "databasesetup.sh"
    
  end

  # Configuring the admin webserver
  config.vm.define "adminserver" do |adminserver|
    adminserver.vm.hostname = "adminserver"
    
    # Port forwarding. Host can reach the webserver at 127.0.0.1:8081, 
    # request will reach webserver's port 80.
    adminserver.vm.network "forwarded_port", guest: 80, host: 8081, host_ip: "127.0.0.1"
    
    # Set up a private network 192.168.56.12 that the VMs will use to communicate
    # with each other. 
    adminserver.vm.network "private_network", ip: "192.168.56.13"

     # The following line is for the CS Labs
    adminserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    # Provision this webserver 
    adminserver.vm.provision "shell", inline: <<-SHELL
    apt-get update
    #install apache2 webserver
    apt-get install -y apache2 php libapache2-mod-php php-mysql

    # Change VM's webserver's configuration to use shared folder.
    # (Look inside user-site.conf for specifics.)
    cp /vagrant/admin-site.conf /etc/apache2/sites-available/

    # Activate our website configuration
    a2ensite admin-site    
    # disable the default website provided with Apache
    a2dissite 000-default
    # Restart the webserver to pick up our configuration changes
    service apache2 reload
  
    SHELL
    
  end



end

