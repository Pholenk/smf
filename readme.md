# System Management Farm

This is a System Information to manage the farmer / breeder who join in the local group

## Requirement
- Nginx 1.10.0
- PHP 7.0
- MySQL 14.14
- Chrome 58.0.3029.110

## Installation

### Nginx configuration
- Configure your nginx. You can follow this recipe https://www.nginx.com/resources/wiki/start/topics/recipes/codeigniter/ or you wanna use this recipe
`
server {
	server_name (your.server.name);
	root /your/root/folder/path;

	index index.php index.html;
	
	location ~* \.(ico|css|js|jpe?g|png)(\?[0-9]+)?$ {
		expires max;
		log_not_found off;
	}

	location / {
		try_files $uri $uri/ /index.php;
	}

	location ~ \.php$ {
		include snippets/fastcgi-php.conf;
		fastcgi_pass unix:/run/php/php7.0-fpm.sock;
	}

}
### Project Configuration

- Change the base url in the file config like your server configuration. \
\ | smf \
\ |- application \
\ |-- config \
\ |--- config.php \

- Change Database environment in application\config\database.php \
\ | smf \
\ |- application \
\ |-- config \
\ |--- database.php \


### Project Migration

- Open CLI and move into the folder root
- type `php index.php Migrate`
- You should be see message `migrating & seeding success`
- If that message does not appear, contact me ASAP
