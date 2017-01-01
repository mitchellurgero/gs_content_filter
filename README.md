# Content Filter Plugin for GNU Social (Not working ATM)
------------------------------
Simple Content filtering (More like word filter) for GNU Social.

## Known Issues

- For now in Qvitter the UI does not update properly when posting a ```#giphy``` hashtagged post. I am looking into this, but it is most likely because the post changes during the save to the db.

## Installing

1. ```cd /var/www/html/plugins``` (Or you GS Plugins directory)
2. ```git clone https://github.com/mitchellurgero/gs_content_filter.gi```
3. Make sure permissions make sense in web server
4. In ```config.php``` put: ```addPlugin('Giphy');```
5. Also in ```config.php``` put ```$config['site']['contentf']['filter'] = array("word1","word2");```

## Updating

Just go into the ```plugin/giphy``` directory and type: ```git pull``` to update.