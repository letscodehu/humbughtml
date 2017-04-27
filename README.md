# humbughtml
Tool generating html reports from humbug's json log.

# Installing

Add it to your composer dependencies:

```json
   "require" : {
       "letscodehu/humbughtml" : "dev-master"
   }
``` 

Then run composer update

Or simply invoke 

```bash
composer require "letscodehu/humbughtml@dev-master"
```

# Usage

From command line: 

```bash
./vendor/letscodehu/humbughtml/bin/humbughtml [--outdir=path/to/generated/html] [--logfile=path/to/humbuglog.json] 
```

It defaults to humbuglog.json and the reports are generated to humbugreports by default.
