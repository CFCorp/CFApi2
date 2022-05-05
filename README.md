# CFsAPI
A small API that sends anime/hentai images in JSON.

[![Discord](https://discordapp.com/api/guilds/434436407646486528/widget.png)](https://discord.gg/gzWwtWG)

| [![twitter](https://cdn.discordapp.com/attachments/155726317222887425/252192520094613504/twiter_banner.JPG)](https://twitter.com/computerfreaker) | [![discord](https://cdn.discordapp.com/attachments/266240393639755778/281920766490968064/discord.png)](https://discord.gg/gzWwtWG)
| --- | --- |
| **Follow me on Twitter.** | **Join my Discord server for help.** |

# Other stuff

### Coming soon

- More endpoints
- Improved randomness
- Better response times

#### FAQ
 Why do I get an error?
 - the most likely issue is that you are using the default user-agent

 Can i help?
- Yes of course just make a PR.

 Will it work on my PC?
- I don't recommend using my stuff but only for testing purposes (maybe).

What is the difference between version 1 and version 2?
- The backend of both of the versions are completely different and optimized for different types of workload due to this [v1](https://github.com/CFCorp/CFsAPI) will be depreciated and not accessable anymore in the future when [v2](https://github.com/CFCorp/CFApi2) is fully released.

What are you using redis for?
- it is just a simple caching step between the API requests and the images it just makes loading the images a bit more optimzed and faster due to this if you decide to run it on your own machine Redis is highly recommended to be used.


# Requirements:
- Web server (Apache/Nginx, PHP, PostgreSQL)
- Redis

### How to setup for dummy's
#### Recommended is Linux
Download & install composer and after that run this in the project directory
`composer install --optimize-autoloader`.

Change stuff in the `.env` to make it be able to connect to the database and set the right logging level

##### Setup database
Change the correct variables in your own `.env` file and then run the migration command with `php` that is built-in to this `php artisan migrate:fresh`

# Roadmap / todo list:
- Create a dashboard with all of the statistics and a token generator
- Make requests only accessible with a token / web login
- Caching with Redis
- Simple file uploader
- 2FA for login
- Remove registration page that is used for debugging
- on dashboard make a page where you can reset your password / set new email
- get the SMTP mailer to work
