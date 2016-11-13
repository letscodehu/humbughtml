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
       "letscodehu/humbuglog" : "dev-master"
   }
```

Then run composer update

# Usage

From command line: 

```bash
./vendor/letscodehu/humbughtml/bin/humbughtml [--outdir=path/to/generated/html] [--logfile=path/to/humbuglog.json] 
```

