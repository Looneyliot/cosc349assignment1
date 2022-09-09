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

  #configuring the webserver
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
            
    
    SHELL
 
  end


end

