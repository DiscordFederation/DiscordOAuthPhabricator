# Discord OAuth 2.0 Provider for Phabricator
This is a basic implementation of an OAuth 2.0 login provider using Discord for Phabricator.

# Installation
Clone this repository to a directory under the same account as that used by your Phabricator instance:
```
git clone https://github.com/DiscordFederation/DiscordOAuthPhabricator.git
```

You need to define this library's dependency on Phabricator by creating a `.arcconfig` file in the cloned repository's directory which points at Phabricator. Here is an example: 
```json
{
  "load": [
    "phabricator/src/"
  ]
}
```

Then set the phabricator config for `load-libraries` to point to the path of the library. If the repostiory was cloned in user's home directory then this command can used from the `phabricator` folder:
```
./bin/config set load-libraries  '["~/DiscordOAuthPhabricator"]'
```

In order for the login provider to have a logo for the buttons we need to copy the PNG files to the folders of the same names in the `phabricator` folder.
```
└── resources
    └── sprite
        ├── login_1x
        │   └── Discord.png
        └── login_2x
            └── Discord.png
```

Once the files are copied make sure to run the following commands from the `phabricator` folder.
First this:

```
./scripts/celerity/generate_sprites.php
```
And then this:
```
./bin/celerity map
```

### Updating Phabricator
This section is only relevant for this those who update their phabricator installation using Git.

Make sure to do remove any changes to the `phabricator/resources/celerity/map.php` file if you're updating phabricator using Git:

```
git checkout -- phabricator/resources/celerity/map.php
```

Finally add the last two commands in the section before to your upgrade scripts.
