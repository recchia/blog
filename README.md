# Blog
MediaMonk


This blog was develop on top of the following tools.

* [Symfony 4](http://symfony.com/) - a set of reusable PHP components
* [Sonata Admin](https://sonata-project.org/) - A set of several rich open source bundles based on Symfony
* [Nginx](https://nginx.org/en/) - Nginx [engine x] is an HTTP and reverse proxy server.
* [PHP-FPM](https://php-fpm.org/) - Alternative PHP FastCGI implementation with additional features useful for sites of any size.
* [Docker](https://www.docker.com/) - Docker is an open platform for developers and sysadmins to build, ship, and run distributed applications.
* [Blackfire](https://blackfire.io/) - Continuous PHP Performance Testing.

### Requirements

  - Docker 17.12.1-ce
  - Docker Compose 1.19.0
  
### Setup, Build & Run

In order to getting the api working you need to execute the next commands.

```sh
$ git clone https://github.com/recchia/blog.git
$ cd blog
$ docker-compose up -d
$ docker exec -ti blog_php bash
$ composer install --prefer-dist
$ yarn install
$ yarn run encore production
```

Next you should browse [http://127.0.0.1:8080](http://127.0.0.1:8080) to see the app running.

### Blackfire (Optional)

Blackfire empowers all developers and IT/Ops to continuously verify and improve their app’s
performance, throughout its lifecycle, by getting the right information at the right moment.

In order to use it you need export the following environment variables. You can set those in user .profile file.

```sh
$ export BLACKFIRE_CLIENT_ID=[hash]
$ export BLACKFIRE_CLIENT_TOKEN=[hash]
$ export BLACKFIRE_SERVER_ID=[hash]
$ export BLACKFIRE_SERVER_TOKEN=[hash]
```

The credentials must be obtained in the blackfire website creating a free hack account. 
You need install too the companion plugin in your browser. The Companion is currently 
available for [Google Chrome](https://blackfire.io/docs/integrations/chrome) and [Firefox](https://blackfire.io/docs/integrations/firefox)

This step is optional and only needed if you want to profile the application, but
you can remove the blackfire service from docker-compose.yml file.
