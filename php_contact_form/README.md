#### PHP Contact Form Repo
This is the Docker environment set up for PHP contact form


#### Prerequisites
1. Install `Docker` from [https://docs.docker.com/install/] 
2. IF you are in Linux, install `docker-compose` from [https://docs.docker.com/install/]


#### Set up
1. Clone the repo
   ```
   git clone git@github.com:spiderPan/Fanshawe-IDP-Inclass.git
   ```
2. Open the folder and run docker-compose
   ```
   cd php_contact_form
   docker-compose up
   ```
3. When you finished work, you can turn if off by doing 
   ```
   docker-compose down
   ```

#### URLs
1. Your project is up in `http://localhost:8080` which is mapping to the `php_contact_form` folder
2. The Mailhog is in `http://localhost:8025`