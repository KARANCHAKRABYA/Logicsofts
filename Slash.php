# Force trailing slash
<IfModule mod_rewrite.c>
	RewriteCond %{REQUEST_URI} /+[^\.]+$ 
	RewriteRule ^(.+[^/])$ %{REQUEST_URI}/ [R=301,L]
</IfModule>

# Force trailing slash on URLs for all users
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_URI} !(.*)/$
RewriteRule ^(.*)$ http://%{HTTP_HOST}/$1/ [L,R=301]
</IfModule>
