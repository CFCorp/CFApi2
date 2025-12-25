# CFsAPI
A small API that sends anime/hentai images in JSON.

[![Discord](https://discordapp.com/api/guilds/434436407646486528/widget.png)](https://discord.gg/gzWwtWG)

| [twitter](https://twitter.com/computerfreaker) | [discord](https://discord.gg/gzWwtWG)
| --- | --- |
| **Follow me on Twitter.** | **Join my Discord server for help.** |

# Other stuff

### Coming soon

- More endpoints
- Improved randomness
- Better response times
- Better categorization 

#### FAQ
 **Why do I get an error, when doing a request?**
 - the most likely issue is that you are using the default user-agent, which is blocked by default for security reasons and AI web crawlers.
 - another possibility is that you are using a web browser, which isn't allowed because everything requires a token to access

 **Can I help?**
- Yes, of course just make a pull request.

 **Will it work on my PC?**
- I don't recommend using my stuff but only for testing purposes (maybe?).

**What is the difference between version 1 and version 2?**
- The backend of both of the versions are completely different and optimized for different types of workload due to this [v1](https://github.com/CFCorp/CFsAPI) will be depreciated and not accessible anymore in the future when [v2](https://github.com/CFCorp/CFApi2) is fully released.

**Why is version 1 no longer available?**
- Too many issues, too little time to fix it
- It has been archived as of **10th of May, 2022**

**What are you using redis for?**
- Simple caching, not a requirement but a nice to have

**Why are you rebuilding your API**
1. PHP is slow and I want better speed
2. PHP setup is a pain in the ass
3. I want to learn some new stuff
4. Better source control
5. Seperate stuff

# So what will change?

- Backend in Rust + JSON
- Frontend in Python and C
- Database will be switched to MongoDB
- Dashboards
- Login Page
- Authentication Methods
- User Tokens and UUIDs
- a lot of minor stuff (response time, optimization, picture storage, etc.)

# Is there a chance that the code will be public
- ~~Yes it will be in the future fully open source~~ It now is

# Roadmap / TODO
### change that the roadmap will get more added depending on my findings

- [ ] Make the whole backend
- 1. [x] connect to the database
- 2. [x] edit the data in the database
- 3. [x] store generated tokens by user
- 4. [ ] keep stored tokens, even on application reboot
- 5. [ ] propper logging of traffic and data
- [ ] Make the frontend
- 1. [ ] make frontend for user pages and login
- 2. [x] make the frontpage
- 3. [ ] uploaders
- 4. [ ] make the dashboard
- 5. [ ] remake the login page
- [ ] remake the loggers
- [x] add tagging
- [ ] 2FA / Different login methods
- [ ] Redis Caching / Any caching method


### Requirements:
- Rust
- Python 3  Python <=3.11 (3.12 removed a feature that is used with the frontend)
- MongoDB
- Redis (not required, just a nice extra)
- Web Server
- Domain Name

### How to set up for dummy's
#### Recommended is Linux/Unix
Download & install Python and Rust for this project then run these 2 commands.

**(frontend)**
```sh
$ make dev-py
```
**(backend)**
```sh
$ make dev-ru
``` 

### Both of these are required.

Change stuff in the `.env` to make it be able to connect to the database and set the right logging level.

also add a `private.rs` file to the backend for the tokenization, no example provided make your own 

##### Setup database
Change the correct variables in your own `.env` file then run `cargo run` it will autopopulate the database

# How to do oauth tokens
### Endpoints
- Will explain this at a later point, will also add some stuff to the dashboard to simplify the process


