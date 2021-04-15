# HDNET Standards

Forces HDNET's coding standards on commits

## Installation
- run ```composer require hdnet/hdnet-standards``` in your project

## Usage
- copy the .php_cs into the root directory of your project and configure the finder if needed
- create a captainhook.json in the root directory of your project (Example: captainhookSample.json)
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
  
- Change path to json-, xml- and yaml-files
```
{
    "action": "\\HDNET\\Standards\\Hook\\JsonHook",
    "options": {
        "directory" : "src/"
    }
},
{
    "action": "\\HDNET\\Standards\\Hook\\YamlHook",
    "options": {
        "directory" : "src/"
    }
},
{
    "action": "\\HDNET\\Standards\\Hook\\XmlHook",
    "options": {
        "directory" : "src/"
    }
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