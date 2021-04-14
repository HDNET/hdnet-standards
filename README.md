# HDNET Standards

Forces HDNET's coding standards on commits

## Usage
- create a captainhook.json in the main project (Example: captainhookSample.json)
- [Usually you would need to `vendor/bin/captainhook configure`, but creating the captainhook.json by hand does that for you]
- Activate captainhook with `vendor/bin/captainhook install --run-mode=lando`
- Configure HDNET Standards to your project

## Configuration
- Change the Jira-Project
```
"action": "\\HDNET\\Standards\\Hook\\Message\\JiraIssue",
    "options": {
    "project": "HDNET"
}
```

- Change path to src-directory
```
"action": "vendor/bin/php-cs-fixer fix src"
```
  
- Change path to xml-files
```
"action": "\\HDNET\\Standards\\Hook\\XmlHook",
"options": {
    "directory" : "/../../tests/data/xml/"
}
```
    
Instead of validating the commit message with the rules of Chris Beams,
you can use conventional commits with the following configuration in the captainhook.json:
```
{
"action": "\\HDNET\\Standards\\Hook\\Message\\ConventionalCommits",
    "options": {
        "config": {
        "typeCase": null,
        "types": [],
        "scopeCase": null,
        "scopeRequired": false,
        "scopes": [],
        "descriptionCase": null,
        "descriptionEndMark": null,
        "bodyRequired": false,
        "bodyWrapWidth": null,
        "requiredFooters": []
        }
    }
}
```

# Tooling
* `lando phpunit` => Execute unit tests