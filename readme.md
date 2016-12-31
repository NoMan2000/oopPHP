# Development Software

Though not required, if you want to follow along it is best if you install Laravel's Homestead/Vagrant box.  Vagrant uses Virtualbox and VMWare to run.  You will need the following dependencies.

- [Virtual Box](https://www.virtualbox.org/wiki/VirtualBox)
- [Vagrant](https://www.vagrantup.com/)
- [Composer](https://getcomposer.org/)
- [PHPStorm](https://www.jetbrains.com/phpstorm/)

Make sure to run this command, unless you have a previous key from Git or some other source.

`ssh-keygen -t rsa -b 4096 -C "your_email@example.com"`

VirtualBox is a Virtual Machine host that allows you to setup different operating system.  This is important since it allows you to configure a development environment that mirrors a production environment.

Vagrant is a set of directives that installs software into a virtual machine.

Composer is a package manager and semantic versioning system for PHP.

PHPStorm is a full IDE built specifically for PHP users.  You can use a different IDE or a text editor, but this course will rely heavily on some of the advanced features of PHPStorm.  There is a free 30 day trial.

## Notes

- Installing on Windows will require extra steps and will be covered in a separate movie from the Mac setup.

- At the time of this recording, there was an Nginx error, using php7.0-fpm instead of php7.1-fpm.  This caused an error on initial installation.  To fix, go to `/etc/nginx/sites-available` and change the configuration to use php7.1-fpm instead of php7.0-fpm.

- After installation, `sudo phpenmod xdebug` will have to be run from within the machine.  This is to make sure that PHPUnit can run the tests.