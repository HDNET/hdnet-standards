# HDNET Standards

Forces HDNET's coding standards on commits

## Usage
- create a captainhook.json in the main project (Example: captainhookSample.json)
- [Usually you would need to `vendor/bin/captainhook configure`, but creating the captainhook.json by hand does that for you]
- Activate captainhook with `vendor/bin/captainhook install`
- Configure HDNET Standards to your project

## Configuration
- Change the Project's Jiraticket
    - src/Hook/Message/JiraIssue.php
        - `return '/XXX-[0-9]+ .*/';`
- Change path to src-directory
    - captainhook.json
        - `"action": "vendor/bin/php-cs-fixer fix src"`
- Change path to xml-files
    - captainhook.json
        - `"action": "vendor/bin/xmllint tests/data/xml"`

# Tooling
* `lando phpunit` => Execute unit tests



# Todo

-> Lokale captainhook.json für dein Projekt anpassen
-> in captainhookSample.json dort "beispielhafte Vollkonfiguration"
-> folders vs. directory (Konfiguration prüfen)
