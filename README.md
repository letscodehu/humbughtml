# humbughtml
Tool generating html reports from humbug's json log.

# Installing

Add the github repository to the composer.json repositories field:

```json
 "repositories" : [
   {
    "type": "vcs",
    "url": "https://github.com/letscodehu/humbughtml"
   }
 ]
```

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

# Usage

From command line: 

```bash
./vendor/letscodehu/humbughtml/bin/humbughtml [--outdir=path/to/generated/html] [--logfile=path/to/humbuglog.json] 
```

