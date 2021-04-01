# HDNET Standards

Forces HDNET's coding standards on commits

## Usage
- create a captainhook.json in the main project (Example: captainhookSample.json)
- Change the Project's Jiraticket (XXX in line 17)
- [Usually you would need to `vendor/bin/captainhook configure`, but creating the captainhook.json by hand does that for you]
- Activate captainhook with `vendor/bincaptainhook install`

# Tooling

* `lando phpunit` => Execute unit tests




# Todo Check

CaptainHook\App\Hook\Message\Action\Beams



"files": "{$STAGED_FILES|of-type:php}"


            {
                "action": "/vendor/bin/php-cs-fixer fix src"
            },
