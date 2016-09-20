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
  config.vm.network "forwarded_port", guest: 4000, host: 4000
  config.proxy.http     = "http://clientproxy.corproot.net:8079"
  config.proxy.https    = "http://clientproxy.corproot.net:8079"
  config.vm.synced_folder "../data", "/vagrant_data"
  config.vm.provision "shell", inline: <<-SHELL
    sudo apt-get update
    sudo apt-get upgrade
    sudo apt-get install -y apache2 libapache2-mod-php php-gd
    sudo apt-get install -y mysql-server 
    sudo apt-get install -y git 
    sudo LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
    sudo apt-get install php7.0 php7.0-fpm php7.0-mysql -y
  SHELL
  config.vm.provision "shell", privileged: false, inline: <<-SHELL
    vundle_dir="~/.vim/bundle"
    if [ ! -d "$vundle_dir" ]; then
      git clone https://github.com/VundleVim/Vundle.vim.git "$vundle_dir/Vundle.vim"
    fi
  SHELL
  config.vm.provision "file", source: "~/.vimrc", destination: ".vimrc"
end
