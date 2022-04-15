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
 Why do I get an error
 - the most likely issue is that you are using the default user-agent

 Can i help
- Yes of course just make a PR.

 Will it work on my PC
- I don't recommend using my stuff but only for testing purposes (maybe).

What is the difference between version 1 and version 2
The backend of both of the versions are completely different and optimized for different types of workload due to this (v1)[https://github.com/CFCorp/CFsAPI] will be depreciated and not accessable anymore in the future when (v2)[https://github.com/CFCorp/CFApi2] is fully released

# Requirements:
- Web server (Apache/Nginx, PHP, MySQL)
- Redis

### How to setup for dummy's
#### Recommended is Linux
With phpstorm (with php in path (or add it in your path)):
    setup composer (be sure it downloads composer.phar)
    and run this command in a terminal in the project directory `php composer.phar install`.

Download & install composer and after that run this in the project directory
`composer install --optimize-autoloader`.


##### Setup doctrine (database)
Check the parameters in `parameters.yml` and run `php bin/console doctrine:schema:validate` to see if the connections work
if everything works except for the sync error run this to sync it `php bin/console doctrine:schema:update --force`.

Windows users use ` \ instead of /`
