# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure(2) do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  config.vm.box = "ubuntu/trusty64"
  if(ENV.include?('HTTP_PROXY'))
    proxy = ENV.fetch('HTTP_PROXY')
    config.proxy.https    = proxy 
    config.proxy.http    = proxy 
  end
  config.vm.network "forwarded_port", guest: 4000, host: 4000
  config.vm.network "forwarded_port", guest: 80, host: 8000
  config.vm.network "forwarded_port", guest: 8080, host: 8080
  config.vm.provider :virtualbox do |vb|
   vb.memory = 8192
   vb.cpus = 2
   #vb.gui = true
  end
  config.vm.synced_folder "data", "/vagrant_data"
  config.vm.provision "shell", inline: <<-SHELL
    sudo apt-get update -y
    sudo apt-get upgrade -y
    apt-get autoremove -y
    sudo apt-get install -y apache2 libapache2-mod-php php-gd
	debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
	debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
    sudo apt-get install -y mysql-server-5.5
	sudo apt-get install -y mysql-server 
    sudo apt-get install -y git 
    sudo LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
    sudo apt-get install php7.0 php7.0-fpm php7.0-mysql -y
	sudo apt-get install -y ubuntu-desktop
  SHELL
  config.vm.provision "shell", privileged: false, inline: <<-SHELL
    vundle_dir="~/.vim/bundle"
    if [ ! -d "$vundle_dir" ]; then
      git clone https://github.com/VundleVim/Vundle.vim.git "$vundle_dir/Vundle.vim"
    fi
  SHELL
  config.vm.provision "file", source: "isithombe.com.conf", destination: "/tmp/isithombe.com.conf"
  config.vm.provision "shell", privileged: false, inline: <<-SHELL
    sudo mv /tmp/isithombe.com.conf /etc/apache2/sites-available/
    sudo a2ensite isithombe.com.conf
    sudo service apache2 reload
  SHELL
  config.vm.provision "file", source: "data/server_configuration/php.ini", destination: "/tmp/php.ini"
  config.vm.provision "shell", inline: <<-SHELL
    sudo mv /tmp/php.ini /etc/php/7.0/apache2/
  SHELL
 # config.vm.provision "file", source: "~/.vimrc", destination: ".vimrc"
  config.push.define "ftp" do |push|
   push.host = "maestro02.ch:5544"
   push.secure = true
   push.username = "wp2016.maestro02.ch"
   push.password = "Web_2016"
   push.dir = "./data"
  end
end
